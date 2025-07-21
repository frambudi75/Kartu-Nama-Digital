// Card Flip Functionality
const card = document.getElementById('business-card');
const front = card.querySelector('.front');

const flipCard = () => {
    card.classList.toggle('flipped');
    
    // Haptic feedback for mobile devices
    if ('vibrate' in navigator) {
        navigator.vibrate(50);
    }
    
    // Track card flip event
    trackEvent('card_flip', {
        action: card.classList.contains('flipped') ? 'show_back' : 'show_front'
    });
};

// Only allow flipping when clicking on the front side
front.addEventListener('click', flipCard);

// Add keyboard navigation support
document.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
        if (document.activeElement === front) {
            e.preventDefault();
            flipCard();
        }
    }
});

// Make front focusable for keyboard navigation
front.setAttribute('tabindex', '0');
front.setAttribute('role', 'button');
front.setAttribute('aria-label', 'Klik untuk melihat detail kontak lengkap');

// Tab Functionality with Touch Gestures
const tabs = document.querySelectorAll('.tab-button');
let touchStartX = 0;
let touchEndX = 0;

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => switchTab(tab, index));
    
    // Add keyboard navigation
    tab.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            switchTab(tab, index);
        } else if (e.key === 'ArrowLeft' && index > 0) {
            tabs[index - 1].focus();
        } else if (e.key === 'ArrowRight' && index < tabs.length - 1) {
            tabs[index + 1].focus();
        }
    });
});

function switchTab(tab, index) {
    // Remove active class from all tabs
    tabs.forEach(t => t.classList.remove('active'));
    // Add active class to clicked tab
    tab.classList.add('active');

    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });

    // Show the selected tab content
    const tabId = tab.getAttribute('data-tab');
    document.getElementById(tabId).classList.add('active');
    
    // Haptic feedback
    if ('vibrate' in navigator) {
        navigator.vibrate(30);
    }
    
    // Track tab switch
    trackEvent('tab_switch', {
        tab: tabId,
        index: index
    });
    
    // Generate QR code when QR tab is clicked
    if (tabId === 'qr-code') {
        generateQRCode();
    }
}

// Touch gesture support for tab switching
const tabContainer = document.querySelector('.back');
tabContainer.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

tabContainer.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeThreshold = 50;
    const currentActiveTab = document.querySelector('.tab-button.active');
    const currentIndex = Array.from(tabs).indexOf(currentActiveTab);
    
    if (touchEndX < touchStartX - swipeThreshold && currentIndex < tabs.length - 1) {
        // Swipe left - next tab
        switchTab(tabs[currentIndex + 1], currentIndex + 1);
    } else if (touchEndX > touchStartX + swipeThreshold && currentIndex > 0) {
        // Swipe right - previous tab
        switchTab(tabs[currentIndex - 1], currentIndex - 1);
    }
}

// Enhanced Copy to Clipboard with Toast and Analytics
const copyToClipboard = (text) => {
    navigator.clipboard.writeText(text).then(() => {
        showToast('Email berhasil disalin!');
        
        // Haptic feedback
        if ('vibrate' in navigator) {
            navigator.vibrate(100);
        }
        
        // Track copy event
        trackEvent('email_copied', {
            email: text
        });
    }).catch(err => {
        console.error('Gagal menyalin teks: ', err);
        showToast('Gagal menyalin teks', 'error');
        
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        try {
            document.execCommand('copy');
            showToast('Email berhasil disalin!');
            trackEvent('email_copied_fallback', { email: text });
        } catch (fallbackErr) {
            showToast('Gagal menyalin teks', 'error');
        }
        document.body.removeChild(textArea);
    });
};

// Toast Notification
const showToast = (message, type = 'success') => {
    // Remove existing toast if any
    const existingToast = document.querySelector('.toast');
    if (existingToast) {
        existingToast.remove();
    }
    
    const toast = document.createElement('div');
    toast.className = `toast ${type === 'error' ? 'bg-red-500' : 'bg-green-500'}`;
    toast.innerHTML = `<i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'check-circle'} mr-2"></i>${message}`;
    document.body.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 100);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }, 3000);
};

// Dark Mode Toggle
const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;
const html = document.documentElement;

// Check for saved dark mode preference
const isDarkMode = localStorage.getItem('darkMode') === 'true';
if (isDarkMode) {
    body.classList.add('dark');
    html.classList.add('dark');
}

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark');
    html.classList.toggle('dark');
    
    // Save preference
    localStorage.setItem('darkMode', body.classList.contains('dark'));
    
    // Show toast
    showToast(body.classList.contains('dark') ? 'Mode gelap diaktifkan' : 'Mode terang diaktifkan');
});

// View Counter
let viewCount = parseInt(localStorage.getItem('viewCount') || '0');
viewCount++;
localStorage.setItem('viewCount', viewCount.toString());
document.getElementById('viewCounter').textContent = viewCount;

// QR Code Generation
let qrCodeGenerated = false;

const generateQRCode = () => {
    if (qrCodeGenerated) return;
    
    const qrContainer = document.getElementById('qrcode');
    qrContainer.innerHTML = ''; // Clear previous QR code
    
    const contactData = `BEGIN:VCARD
VERSION:3.0
FN:Habib Frambudi
ORG:IT Engineer
TITLE:Full Stack Developer
TEL:+6281707059700
EMAIL:habibframbudi@gmail.com
URL:https://forto.habibframbudi.my.id
END:VCARD`;

    QRCode.toCanvas(contactData, {
        width: 200,
        height: 200,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.M
    }, (error, canvas) => {
        if (error) {
            console.error('QR Code generation failed:', error);
            qrContainer.innerHTML = '<p class="text-red-500">Gagal membuat QR Code</p>';
            return;
        }
        
        qrContainer.appendChild(canvas);
        qrCodeGenerated = true;
    });
};

// Download QR Code
const downloadQR = () => {
    const canvas = document.querySelector('#qrcode canvas');
    if (!canvas) {
        showToast('QR Code belum dibuat', 'error');
        return;
    }
    
    const link = document.createElement('a');
    link.download = 'habib-frambudi-contact-qr.png';
    link.href = canvas.toDataURL();
    link.click();
    
    showToast('QR Code berhasil didownload!');
};

// Multi-language Support
const translations = {
    id: {
        contact: 'Kontak',
        location: 'Lokasi',
        message: 'Pesan',
        qr: 'QR',
        name: 'Nama Anda',
        email: 'Email',
        messageText: 'Pesan',
        send: 'Kirim',
        instruction: 'Klik/Tap kartu untuk detail lengkap'
    },
    en: {
        contact: 'Contact',
        location: 'Location',
        message: 'Message',
        qr: 'QR',
        name: 'Your Name',
        email: 'Email',
        messageText: 'Message',
        send: 'Send',
        instruction: 'Click/Tap card for full details'
    }
};

let currentLang = localStorage.getItem('language') || 'id';

const switchLanguage = () => {
    currentLang = currentLang === 'id' ? 'en' : 'id';
    localStorage.setItem('language', currentLang);
    
    // Update UI text
    const t = translations[currentLang];
    document.querySelector('[data-tab="contact-info"]').innerHTML = `<i class="fas fa-address-card mr-1"></i> ${t.contact}`;
    document.querySelector('[data-tab="location"]').innerHTML = `<i class="fas fa-map-marker-alt mr-1"></i> ${t.location}`;
    document.querySelector('[data-tab="contact-form"]').innerHTML = `<i class="fas fa-paper-plane mr-1"></i> ${t.message}`;
    document.querySelector('[data-tab="qr-code"]').innerHTML = `<i class="fas fa-qrcode mr-1"></i> ${t.qr}`;
    
    showToast(`Language switched to ${currentLang === 'id' ? 'Indonesian' : 'English'}`);
};

// Enhanced Form submission handler with offline support
document.getElementById('contactForm').addEventListener('submit', function(e) {
    const submitButton = e.target.querySelector('button[type="submit"]');
    const formData = new FormData(e.target);
    
    // Show loading state
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
    
    // Track form submission attempt
    trackEvent('form_submit_attempt', {
        name: formData.get('name'),
        email: formData.get('email')
    });
    
    // Check if online
    if (!navigator.onLine) {
        // Store form data for later sync
        const formDataObj = {
            name: formData.get('name'),
            email: formData.get('email'),
            message: formData.get('message'),
            timestamp: Date.now()
        };
        
        localStorage.setItem('pendingFormSubmission', JSON.stringify(formDataObj));
        
        // Register background sync if supported
        if ('serviceWorker' in navigator && 'sync' in window.ServiceWorkerRegistration.prototype) {
            navigator.serviceWorker.ready.then(registration => {
                return registration.sync.register('contact-form-sync');
            });
        }
        
        showToast('Anda sedang offline. Pesan akan dikirim saat koneksi tersedia.', 'warning');
        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="fas fa-paper-plane mr-2"></i> Kirim';
        e.preventDefault();
        return;
    }
    
    // Let the form submit naturally to Formspree for online submissions
});

// Handle online/offline status
window.addEventListener('online', () => {
    showToast('Koneksi internet tersambung kembali', 'success');
    
    // Try to sync pending form submissions
    const pendingSubmission = localStorage.getItem('pendingFormSubmission');
    if (pendingSubmission) {
        const data = JSON.parse(pendingSubmission);
        // Submit the pending form data
        fetch('https://formspree.io/f/movljoar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        }).then(response => {
            if (response.ok) {
                localStorage.removeItem('pendingFormSubmission');
                showToast('Pesan yang tertunda berhasil dikirim!', 'success');
                trackEvent('form_submit_success_offline', data);
            }
        }).catch(err => {
            console.error('Failed to send pending form:', err);
        });
    }
});

window.addEventListener('offline', () => {
    showToast('Koneksi internet terputus', 'warning');
});

// Enhanced Analytics and Error Tracking
const trackPageView = () => {
    // Track page view with additional data
    const data = {
        page: window.location.pathname,
        referrer: document.referrer,
        userAgent: navigator.userAgent,
        timestamp: Date.now(),
        viewportSize: `${window.innerWidth}x${window.innerHeight}`,
        colorDepth: screen.colorDepth,
        language: navigator.language
    };
    
    trackEvent('page_view', data);
    console.log('Page view tracked with enhanced data');
};

const trackEvent = (eventName, data = {}) => {
    // Store events locally for later analysis
    const events = JSON.parse(localStorage.getItem('analytics_events') || '[]');
    events.push({
        event: eventName,
        data: data,
        timestamp: Date.now(),
        sessionId: getSessionId()
    });
    
    // Keep only last 100 events to prevent storage overflow
    if (events.length > 100) {
        events.splice(0, events.length - 100);
    }
    
    localStorage.setItem('analytics_events', JSON.stringify(events));
    
    // Send to analytics service if available
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, data);
    }
    
    console.log('Event tracked:', eventName, data);
};

const getSessionId = () => {
    let sessionId = sessionStorage.getItem('sessionId');
    if (!sessionId) {
        sessionId = 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        sessionStorage.setItem('sessionId', sessionId);
    }
    return sessionId;
};

// Error tracking
window.addEventListener('error', (e) => {
    trackEvent('javascript_error', {
        message: e.message,
        filename: e.filename,
        lineno: e.lineno,
        colno: e.colno,
        stack: e.error ? e.error.stack : null
    });
});

// Unhandled promise rejection tracking
window.addEventListener('unhandledrejection', (e) => {
    trackEvent('unhandled_promise_rejection', {
        reason: e.reason,
        stack: e.reason && e.reason.stack ? e.reason.stack : null
    });
});

// Enhanced Initialization with Performance Monitoring
document.addEventListener('DOMContentLoaded', () => {
    const startTime = performance.now();
    
    trackPageView();
    
    // Add skill tag hover effects with performance optimization
    const skillTags = document.querySelectorAll('.skill-tag');
    skillTags.forEach(tag => {
        tag.addEventListener('mouseenter', () => {
            requestAnimationFrame(() => {
                tag.style.transform = 'translateY(-2px) scale(1.05)';
            });
        });
        
        tag.addEventListener('mouseleave', () => {
            requestAnimationFrame(() => {
                tag.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Track skill tag interactions
        tag.addEventListener('click', () => {
            trackEvent('skill_tag_click', {
                skill: tag.textContent.trim()
            });
        });
    });
    
    // Enhanced contact method tracking
    document.querySelectorAll('.contact-method').forEach(method => {
        method.addEventListener('click', () => {
            const methodType = method.querySelector('.text-xs').textContent;
            const methodValue = method.querySelector('.font-medium').textContent;
            
            trackEvent('contact_method_click', {
                type: methodType,
                value: methodValue
            });
        });
    });
    
    // Social media click tracking
    document.querySelectorAll('.social-icon').forEach(icon => {
        icon.addEventListener('click', () => {
            const platform = icon.querySelector('i').className.split(' ').find(cls => cls.startsWith('fa-'));
            trackEvent('social_media_click', {
                platform: platform
            });
        });
    });
    
    // Check if there's a success parameter in URL (from Formspree redirect)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === 'true') {
        document.getElementById('form-success').classList.remove('hidden');
        trackEvent('form_submit_success', {});
        
        // Hide success message after 5 seconds
        setTimeout(() => {
            document.getElementById('form-success').classList.add('hidden');
            // Clean URL
            window.history.replaceState({}, document.title, window.location.pathname);
        }, 5000);
    }
    
    // Performance monitoring
    window.addEventListener('load', () => {
        const loadTime = performance.now() - startTime;
        trackEvent('page_load_performance', {
            loadTime: Math.round(loadTime),
            domContentLoaded: Math.round(startTime),
            resources: performance.getEntriesByType('resource').length
        });
    });
    
    // Intersection Observer for lazy loading and view tracking
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const elementId = entry.target.id || entry.target.className;
                trackEvent('element_viewed', {
                    element: elementId,
                    viewTime: Date.now()
                });
            }
        });
    }, observerOptions);
    
    // Observe key elements
    document.querySelectorAll('.tab-content, .profile-container, .contact-method').forEach(el => {
        observer.observe(el);
    });
});

// Add loading states and skeleton screens
const addLoadingState = (element) => {
    element.classList.add('loading');
    element.style.pointerEvents = 'none';
};

const removeLoadingState = (element) => {
    element.classList.remove('loading');
    element.style.pointerEvents = 'auto';
};

// Enhanced Google Maps error handling
const handleMapError = () => {
    const mapContainer = document.getElementById('map');
    if (mapContainer) {
        mapContainer.innerHTML = `
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg text-center">
                <i class="fas fa-map-marked-alt text-gray-400 text-2xl mb-2"></i>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Peta tidak dapat dimuat. <br>
                    <a href="https://maps.google.com/?q=Jl.+Sudirman+No.123+Jakarta+Selatan" 
                       target="_blank" 
                       class="text-blue-600 hover:underline">
                        Buka di Google Maps
                    </a>
                </p>
            </div>
        `;
    }
};

// Monitor map loading
setTimeout(() => {
    const iframe = document.querySelector('#map iframe');
    if (iframe && !iframe.complete) {
        handleMapError();
    }
}, 5000);

// PWA Support
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('SW registered: ', registration);
            })
            .catch(registrationError => {
                console.log('SW registration failed: ', registrationError);
            });
    });
}

// Add language toggle via double-click on title (hidden feature)
document.querySelector('.profile-name').addEventListener('dblclick', switchLanguage);
