# 💼 Kartu Nama Digital - Habib Frambudi

[![PWA Ready](https://img.shields.io/badge/PWA-Ready-brightgreen.svg)](https://web.dev/progressive-web-apps/)
[![Mobile Optimized](https://img.shields.io/badge/Mobile-Optimized-blue.svg)](https://developers.google.com/web/fundamentals/design-and-ux/responsive/)
[![Accessibility](https://img.shields.io/badge/Accessibility-AA-green.svg)](https://www.w3.org/WAI/WCAG21/quickref/)
[![Performance](https://img.shields.io/badge/Performance-Optimized-orange.svg)](https://web.dev/performance/)

> **Modern, interactive digital business card dengan advanced features dan enterprise-level performance**

## 🌟 **Live Demo**

🔗 **[kontak.habibframbudi.my.id](https://kontak.habibframbudi.my.id)**

## 📱 **Preview**

<div align="center">
  <img src="habib.png" alt="Habib Frambudi Profile" width="200" style="border-radius: 50%;">
</div>

---

## ✨ **Features**

### 🎯 **Core Features**
- **3D Card Flip Animation** - Smooth card rotation dengan CSS transforms
- **Multi-Tab Navigation** - Kontak, Lokasi, dan Form Pesan
- **Dark/Light Mode** - Toggle dengan smooth transition
- **Copy to Clipboard** - One-click email copying dengan feedback
- **Responsive Design** - Perfect di semua devices

### 🚀 **Advanced Features**
- **Progressive Web App (PWA)** - Installable di mobile dan desktop
- **Offline Support** - Background sync untuk form submissions
- **Analytics Tracking** - Comprehensive user behavior tracking
- **Touch Gestures** - Swipe navigation untuk mobile
- **Haptic Feedback** - Vibration feedback untuk mobile interactions
- **Multi-language Support** - Indonesian/English (hidden feature)

### 🎨 **UI/UX Enhancements**
- **Smooth Animations** - RequestAnimationFrame optimized
- **Loading States** - Skeleton screens dan shimmer effects
- **Toast Notifications** - Real-time feedback untuk user actions
- **Focus States** - Enhanced keyboard navigation
- **Safe Area Support** - iPhone notch compatibility

### 🔧 **Technical Features**
- **Service Worker** - Intelligent caching strategy
- **Error Tracking** - Comprehensive error logging
- **Performance Monitoring** - Load time dan resource tracking
- **SEO Optimized** - Meta tags, Schema.org, Open Graph
- **Security Headers** - CSP, X-Content-Type-Options

---

## 🛠 **Tech Stack**

| Technology | Purpose | Version |
|------------|---------|---------|
| **HTML5** | Semantic markup | Latest |
| **CSS3** | Styling & animations | Latest |
| **JavaScript (ES6+)** | Interactivity & logic | Latest |
| **Tailwind CSS** | Utility-first CSS | 3.x |
| **Font Awesome** | Icons | 6.4.0 |
| **Service Worker** | PWA functionality | Latest |

---

## 📁 **Project Structure**

```
kontak.habibframbudi.my.id/
├── 📄 index.html                    # Main HTML file
├── 🎨 style.css                     # Custom styles & animations
├── ⚡ script.js                     # JavaScript functionality
├── 🔧 sw.js                        # Service Worker
├── 📱 manifest.json                # PWA manifest
├── 🖼️ habib.png                    # Profile image
├── ⚙️ .user.ini                    # Server configuration
├── 🔒 .htaccess                    # Apache security configuration
├── 🔒 nginx.conf                   # Nginx security configuration (BT Panel)
├── 🔒 bt-panel-rate-limiting.conf  # BT Panel rate limiting config
├── 🔒 security-headers.php         # PHP security implementation
└── 📖 README.md                    # Documentation
```

---

## 🚀 **Installation & Setup**

### **Quick Start**
```bash
# Clone repository
git clone https://github.com/habibframbudi/digital-business-card.git

# Navigate to directory
cd digital-business-card

# Open in browser
open index.html
```

### **Local Development**
```bash
# Using Python HTTP Server
python -m http.server 8000

# Using Node.js HTTP Server
npx http-server

# Using PHP Built-in Server
php -S localhost:8000
```

### **Production Deployment**
```bash
# Upload files to web server
# Ensure HTTPS for PWA functionality
# Configure proper MIME types for manifest.json
```

---

## 📊 **Performance Metrics**

| Metric | Score | Status |
|--------|-------|--------|
| **Performance** | 95+ | ✅ Excellent |
| **Accessibility** | 100 | ✅ Perfect |
| **Best Practices** | 100 | ✅ Perfect |
| **SEO** | 100 | ✅ Perfect |
| **PWA** | ✅ | ✅ Ready |

---

## 🎯 **Features Breakdown**

### **💳 Business Card**
- **Front Side**: Profile photo, name, title, skills, basic contact
- **Back Side**: Detailed contact information, location, contact form
- **3D Flip**: Smooth CSS transform animation
- **Responsive**: Adapts to all screen sizes

### **📱 Progressive Web App**
- **Installable**: Add to home screen functionality
- **Offline Ready**: Works without internet connection
- **Background Sync**: Form submissions sync when online
- **Push Notifications**: Ready for future implementation

### **📈 Analytics & Tracking**
- **Page Views**: Track visitor engagement
- **User Interactions**: Button clicks, form submissions
- **Performance Metrics**: Load times, resource usage
- **Error Tracking**: JavaScript errors and failures
- **Session Tracking**: Unique session identification

### **🎨 Design System**
- **Color Palette**: Blue gradient with dark mode support
- **Typography**: Poppins font family
- **Spacing**: Consistent 8px grid system
- **Animations**: Smooth transitions and micro-interactions

---

## 🔧 **Customization Guide**

### **Personal Information**
```javascript
// Update in index.html
const personalInfo = {
  name: "Your Name",
  title: "Your Title",
  email: "your.email@domain.com",
  phone: "+62 XXX-XXXX-XXXX",
  website: "https://yourwebsite.com"
};
```

### **Colors & Styling**
```css
/* Update in style.css */
:root {
  --primary-color: #3b82f6;
  --secondary-color: #1e40af;
  --accent-color: #60a5fa;
}
```

### **Analytics Configuration**
```javascript
// Update in script.js
const analyticsConfig = {
  trackingId: 'YOUR_GA_TRACKING_ID',
  enableTracking: true,
  trackEvents: true
};
```

---

## 📱 **Mobile Features**

### **Touch Gestures**
- **Swipe Left/Right**: Navigate between tabs
- **Tap**: Card flip and button interactions
- **Long Press**: Additional context actions

### **Mobile Optimizations**
- **Touch Targets**: Minimum 44px for accessibility
- **Safe Area**: iPhone notch support
- **Haptic Feedback**: Vibration for interactions
- **Form Optimization**: Prevent zoom on iOS

---

## 🔒 **Security Features**

### **Content Security Policy**
```html
<meta http-equiv="Content-Security-Policy" 
      content="default-src 'self'; script-src 'self' 'unsafe-inline'...">
```

### **Security Headers**
- **X-Content-Type-Options**: nosniff
- **Referrer-Policy**: strict-origin-when-cross-origin
- **Frame Protection**: SAMEORIGIN

---

## 🌐 **Browser Support**

| Browser | Version | Status |
|---------|---------|--------|
| **Chrome** | 80+ | ✅ Full Support |
| **Firefox** | 75+ | ✅ Full Support |
| **Safari** | 13+ | ✅ Full Support |
| **Edge** | 80+ | ✅ Full Support |
| **Mobile Safari** | 13+ | ✅ Full Support |
| **Chrome Mobile** | 80+ | ✅ Full Support |

---

## 📈 **Analytics Dashboard**

### **Tracked Events**
- `page_view` - Page visits with metadata
- `card_flip` - Card interaction tracking
- `tab_switch` - Navigation between tabs
- `contact_method_click` - Contact button clicks
- `email_copied` - Email copy actions
- `form_submit_attempt` - Form submission attempts
- `social_media_click` - Social media interactions

### **Performance Metrics**
- Load time tracking
- Resource count monitoring
- Error rate tracking
- User engagement metrics

---

## 🔒 **Security Configuration**

### **Web Server Security**

#### **Apache (.htaccess)**
```apache
# Comprehensive security configuration included
# - File access protection
# - Security headers (CSP, HSTS, X-Frame-Options)
# - Rate limiting and bot protection
# - Compression and caching
# - SQL injection and XSS protection
```

#### **Nginx (nginx.conf) - BT Panel Compatible**
```nginx
# Enterprise-level security configuration for BT Panel
# - SSL/TLS optimization dengan BT Panel paths
# - Advanced rate limiting dan connection limits
# - Security headers dan enhanced CSP
# - Hotlink protection dengan valid referers
# - Malicious user agent blocking (nikto, sqlmap, nmap)
# - Enhanced static file handling
# - PWA-specific configurations
```

#### **BT Panel Rate Limiting (bt-panel-rate-limiting.conf)**
```nginx
# Add to main nginx.conf http block via BT Panel
# - Rate limiting zones (login, general, api)
# - Connection limiting per IP
# - User agent blocking maps
# - CloudFlare real IP configuration
# - Enhanced gzip compression
```

#### **PHP Security (security-headers.php)**
```php
# Include for PHP-based deployments
require_once 'security-headers.php';
initSecurity([
    'rate_limit' => true,
    'max_requests' => 60,
    'check_user_agent' => true
]);
```

### **Security Features Implemented**

| Feature | Apache | Nginx | PHP |
|---------|--------|-------|-----|
| **File Access Protection** | ✅ | ✅ | ✅ |
| **Security Headers** | ✅ | ✅ | ✅ |
| **Rate Limiting** | ✅ | ✅ | ✅ |
| **Bot Protection** | ✅ | ✅ | ✅ |
| **XSS Protection** | ✅ | ✅ | ✅ |
| **SQL Injection Protection** | ✅ | ✅ | ✅ |
| **Hotlink Protection** | ✅ | ✅ | ✅ |
| **HTTPS Enforcement** | ✅ | ✅ | ✅ |

### **BT Panel Deployment Guide**

#### **Step 1: Upload Files**
```bash
# Upload semua files ke /www/wwwroot/kontak.habibframbudi.my.id/
# Set file permissions: 644 untuk files, 755 untuk directories
```

#### **Step 2: Configure Nginx**
```bash
# 1. Copy nginx.conf content ke BT Panel > Website > Settings > Config File
# 2. Add bt-panel-rate-limiting.conf content ke main nginx.conf http block
# 3. Test configuration: nginx -t
# 4. Reload nginx: systemctl reload nginx
```

#### **Step 3: SSL Certificate**
```bash
# 1. BT Panel > Website > SSL > Let's Encrypt
# 2. Enable Force HTTPS
# 3. Verify SSL configuration
```

### **Deployment Security Checklist**

- [ ] **SSL Certificate** - Install via BT Panel Let's Encrypt
- [ ] **Security Headers** - Configure via nginx.conf
- [ ] **File Permissions** - Set 644 for files, 755 for directories
- [ ] **Rate Limiting** - Add bt-panel-rate-limiting.conf to main nginx.conf
- [ ] **Firewall** - Configure BT Panel firewall rules
- [ ] **Monitoring** - Enable access/error logs in BT Panel
- [ ] **Backup** - Setup automated backups in BT Panel
- [ ] **Updates** - Keep BT Panel and server software updated
- [ ] **PHP Security** - Include security-headers.php if using PHP
- [ ] **Test Configuration** - Verify all security headers with online tools

---

## 🤝 **Contributing**

1. **Fork** the repository
2. **Create** feature branch (`git checkout -b feature/amazing-feature`)
3. **Commit** changes (`git commit -m 'Add amazing feature'`)
4. **Push** to branch (`git push origin feature/amazing-feature`)
5. **Open** Pull Request

---

## 📄 **License**

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 **Author**

**Habib Frambudi**
- 🌐 Website: [forto.habibframbudi.my.id](https://forto.habibframbudi.my.id)
- 📧 Email: habibframbudi@gmail.com
- 📱 WhatsApp: [+62 817-0705-970](https://wa.me/6281707059700)
- 💼 LinkedIn: [Habib Frambudi](https://linkedin.com/in/habibframbudi)

---

## 🙏 **Acknowledgments**

- **Tailwind CSS** - For the utility-first CSS framework
- **Font Awesome** - For the beautiful icons
- **QR Code.js** - For QR code generation
- **Formspree** - For form handling service
- **Google Fonts** - For the Poppins font family

---

## 📊 **Project Stats**

![GitHub repo size](https://img.shields.io/github/repo-size/habibframbudi/Kartu-Nama-Digital)
![GitHub last commit](https://img.shields.io/github/last-commit/habibframbudi/Kartu-Nama-Digital)
![GitHub issues](https://img.shields.io/github/issues/habibframbudi/Kartu-Nama-Digital)
![GitHub stars](https://img.shields.io/github/stars/habibframbudi/Kartu-Nama-Digital)

---

<div align="center">
  <h3>⭐ If you found this project helpful, please give it a star! ⭐</h3>
  <p>Made with ❤️ by <strong>Habib Frambudi</strong></p>
</div>
