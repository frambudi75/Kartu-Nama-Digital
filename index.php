<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    
    <!-- SEO Meta Tags -->
    <title>Kartu Nama Digital - Habib Frambudi | IOT Dev & IT Engineer</title>
    <meta name="description" content="Kartu nama digital Habib Frambudi - IOT Dev dan IT Engineer berpengalaman dalam React, Node.js, PHP, dan MySQL. Hubungi untuk konsultasi dan kerjasama proyek teknologi.">
    <meta name="keywords" content="Habib Frambudi, IOT Dev, IT Engineer, React, Node.js, PHP, MySQL, Web Developer, Jakarta">
    <meta name="author" content="Habib Frambudi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://kontak.habibframbudi.my.id">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Kartu Nama Digital - Habib Frambudi">
    <meta property="og:description" content="IOT Dev & IT Engineer berpengalaman dalam React, Node.js, PHP, dan MySQL">
    <meta property="og:image" content="https://kontak.habibframbudi.my.id/habib.png">
    <meta property="og:url" content="https://kontak.habibframbudi.my.id">
    <meta property="og:type" content="profile">
    <meta property="og:locale" content="id_ID">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Kartu Nama Digital - Habib Frambudi">
    <meta name="twitter:description" content="IOT Dev & IT Engineer berpengalaman dalam React, Node.js, PHP, dan MySQL">
    <meta name="twitter:image" content="https://kontak.habibframbudi.my.id/habib.png">
    
    <!-- Security Headers -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdn.jsdelivr.net https://formspree.io; style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://fonts.googleapis.com; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com https://cdnjs.cloudflare.com; img-src 'self' data: https:; connect-src 'self' https://formspree.io https://api.github.com; frame-src https://www.google.com;">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
    
    <!-- Preload Critical Resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" as="style">
    <link rel="preload" href="habib.png" as="image">
    
    <!-- External Resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
    
    <!-- Local Resources -->
    <link rel="stylesheet" href="style.css?v=<?php echo filemtime('style.css'); ?>">
    
    <!-- PWA Configuration -->
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#3b82f6">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Habib Contact">
    <link rel="apple-touch-icon" href="habib.png">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="habib.png">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Habib Frambudi",
      "jobTitle": "IOT Dev",
      "description": "IT Engineer berpengalaman dalam React, Node.js, PHP, dan MySQL",
      "email": "habibframbudi@gmail.com",
      "telephone": "+62-817-0705-970",
      "url": "https://forto.habibframbudi.my.id",
      "image": "https://kontak.habibframbudi.my.id/habib.png",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jl. Sudirman No.123",
        "addressLocality": "Jakarta Selatan",
        "addressCountry": "Indonesia"
      },
      "knowsAbout": ["React", "Node.js", "PHP", "MySQL", "Full Stack Development", "Web Development"],
      "sameAs": [
        "https://forto.habibframbudi.my.id",
        "https://wa.me/6281707059700"
      ]
    }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
    <!-- Dark Mode Toggle -->
    <div class="fixed top-4 right-4 z-50">
        <button id="darkModeToggle" class="bg-white dark:bg-gray-800 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 text-gray-600 dark:text-gray-300">
            <i class="fas fa-moon dark:hidden"></i>
            <i class="fas fa-sun hidden dark:block"></i>
        </button>
    </div>

    <!-- View Counter -->
    <div class="fixed top-4 left-4 z-50">
        <div class="bg-white dark:bg-gray-800 px-3 py-2 rounded-full shadow-lg text-xs font-medium text-gray-600 dark:text-gray-300">
            <i class="fas fa-eye mr-1"></i>
            <span id="viewCounter">0</span> views
        </div>
    </div>

    <div id="app" class="w-full max-w-md mx-auto">
        <!-- Business Card -->
        <div class="card-container">
            <div id="business-card" class="card relative">
                <!-- Front Side -->
                <div class="front bg-gradient-to-br from-blue-500 to-blue-600 p-8 text-white flex flex-col items-center justify-center">
                    <!-- Profile Image -->
                    <div class="profile-container">
                        <img src="habib.png" 
                             alt="Foto Profil">
                        <div class="online-status">
                            ONLINE
                        </div>
                    </div>
                    
                    <!-- Name and Title -->
                    <h1 class="profile-name text-white">Habib Frambudi</h1>
                    <p class="profile-title text-white">IOT Dev • IT Engineer</p>
                    
                    <!-- Skill Tags -->
                    <div class="mt-4 flex flex-wrap justify-center gap-2">
                        <span class="skill-tag bg-white/20 text-white px-3 py-1 rounded-full text-xs font-medium">React</span>
                        <span class="skill-tag bg-white/20 text-white px-3 py-1 rounded-full text-xs font-medium">Node.js</span>
                        <span class="skill-tag bg-white/20 text-white px-3 py-1 rounded-full text-xs font-medium">PHP</span>
                        <span class="skill-tag bg-white/20 text-white px-3 py-1 rounded-full text-xs font-medium">MySQL</span>
                    </div>
                    
                    <!-- Simple Contact Info -->
                    <div class="mt-6 space-y-2 text-center">
                        <p class="text-sm"><i class="fas fa-envelope mr-2"></i> habibframbudi@gmail.com</p>
                        <p class="text-sm"><i class="fas fa-phone-alt mr-2"></i> +62 817-0705-970</p>
                    </div>
                    
                    <!-- Instruction -->
                    <div class="absolute bottom-8 left-0 right-0 text-center">
                        <p class="text-sm opacity-90">Klik/Tap kartu untuk detail lengkap</p>
                    </div>
                </div>
                
                <!-- Back Side -->
                <div class="back bg-white dark:bg-gray-800">
                    <!-- Tab Navigation -->
                    <div class="flex border-b border-gray-200 dark:border-gray-600">
                        <button class="tab-button flex-1 py-3 font-medium text-gray-500 dark:text-gray-400 active" data-tab="contact-info">
                            <i class="fas fa-address-card mr-2"></i> Kontak
                        </button>
                        <button class="tab-button flex-1 py-3 font-medium text-gray-500 dark:text-gray-400" data-tab="location">
                            <i class="fas fa-map-marker-alt mr-2"></i> Lokasi
                        </button>
                        <button class="tab-button flex-1 py-3 font-medium text-gray-500 dark:text-gray-400" data-tab="contact-form">
                            <i class="fas fa-paper-plane mr-2"></i> Pesan
                        </button>
                    </div>
                    
                    <!-- Tab Contents -->
                    <div class="flex-1 overflow-auto p-5">
                        <!-- Contact Info Tab -->
                        <div id="contact-info" class="tab-content active">
                            <div class="space-y-3">
                                <!-- Email -->
                                <div onclick="copyToClipboard('habibframbudi@gmail.com')" class="contact-method flex items-center bg-gray-100 dark:bg-gray-700 p-3 rounded-lg cursor-pointer transition-all duration-300">
                                    <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400 p-2 rounded-full mr-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Email</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">habibframbudi@gmail.com</p>
                                    </div>
                                </div>
                                
                                <!-- WhatsApp -->
                                <a href="https://wa.me/6281707059700" target="_blank" class="block">
                                    <div class="contact-method flex items-center bg-gray-100 dark:bg-gray-700 p-3 rounded-lg cursor-pointer transition-all duration-300">
                                        <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-400 p-2 rounded-full mr-3">
                                            <i class="fab fa-whatsapp"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">WhatsApp</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">+62 817-0705-970</p>
                                        </div>
                                    </div>
                                </a>
                                
                                <!-- Website -->
                                <a href="https://forto.habibframbudi.my.id" target="_blank" class="block">
                                    <div class="contact-method flex items-center bg-gray-100 dark:bg-gray-700 p-3 rounded-lg cursor-pointer transition-all duration-300">
                                        <div class="bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-400 p-2 rounded-full mr-3">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Website</p>
                                            <p class="font-medium text-gray-900 dark:text-gray-100">forto.habibframbudi.my.id</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-600">
                                <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-3">SOSIAL MEDIA</h3>
                                <div class="flex justify-center space-x-3">
                                    <a href="#" class="social-icon bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-icon bg-blue-400 text-white w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="@habib_frambudi" class="social-icon bg-gradient-to-r from-purple-500 to-pink-500 text-white w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="social-icon bg-gray-800 text-white w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Location Tab -->
                        <div id="location" class="tab-content">
                            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Lokasi Kantor</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                <i class="fas fa-map-marker-alt text-red-500 mr-2"></i> 
                                Jl. Dusun Sederhana,Beringin
                            </p>
                            
                            <!-- Google Maps Embed -->
                            <div id="map" class="mb-4">
                                <!-- Replace this with your actual Google Maps embed code -->
                                    <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127473.86911033127!2d98.8783862!3d3.5928958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30314985c1842c49%3A0x3c467360b141519f!2sPerumahan%20RAMUNIA%20RESIDENCE!5e0!3m2!1sen!2sid!4v1719220134204!5m2!1sen!2sid" 
                                    width="100%" 
                                    height="180" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                            </div>
                            
                            <!-- <div class="bg-blue-50 p-3 rounded-lg">
                                <h4 class="font-medium text-sm text-blue-800 mb-2">
                                    <i class="fas fa-clock mr-2"></i> Jam Operasional:
                                </h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>Senin-Jumat: 09.00 - 17.00</li>
                                    <li>Sabtu: 09.00 - 14.00</li>
                                    <li>Minggu: Tutup</li>
                                </ul>
                            </div> -->
                        </div>
                        
                        <!-- Contact Form Tab -->
                        <div id="contact-form" class="tab-content">
                            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Kirim Pesan</h3>
                            <form id="contactForm" action="https://formspree.io/f/movljoar" method="POST" class="space-y-3">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Anda</label>
                                    <input type="text" id="name" name="name" required 
                                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                                    <input type="email" id="email" name="email" required 
                                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pesan</label>
                                    <textarea id="message" name="message" rows="3" required 
                                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>
                                
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                                    <i class="fas fa-paper-plane mr-2"></i> Kirim
                                </button>
                            </form>
                            
                            <div id="form-success" class="hidden mt-3 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-lg text-sm">
                                Pesan berhasil dikirim! Saya akan segera menghubungi Anda.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js?v=<?php echo filemtime('script.js'); ?>"></script>
</body>
</html>
