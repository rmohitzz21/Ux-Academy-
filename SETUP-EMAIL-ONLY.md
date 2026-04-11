# UX Academy PHP - Quick Setup Guide (Email-Only Mode)

## 🎉 No Database Required!

This is the **simplified email-only version**. Forms submit and send email notifications - that's it. No MySQL, no database, no storage.

---

## 🚀 5-Minute Setup

### Step 1: Start XAMPP
1. Open XAMPP Control Panel
2. Click **Start** on both Apache and MySQL (MySQL optional, not needed)
3. Wait for confirmation they're running

### Step 2: Configure Email

Edit `.env` file:
```
c:\xampp\htdocs\Ux\Ux-Academy-\.env
```

Update the email settings:

**Option A: Use Mailtrap (RECOMMENDED - Free Testing)**
- Go to https://mailtrap.io/
- Sign up (free)
- Create new Inbox
- Copy these 2 lines from "SMTP Settings" → "Integrations" → "PHP":
  ```
  MAIL_USERNAME=your_username
  MAIL_PASSWORD=your_password
  ```
- Paste into `.env`:
  ```ini
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=2525
  MAIL_USERNAME=your_username
  MAIL_PASSWORD=your_password
  MAIL_ENCRYPTION=tls
  ```

**Option B: Use PHP's Built-in mail()**
- Leave SMTP settings as is
- System will use `mail()` function (may work on your server)

**Option C: Use Gmail**
- Create app-specific password: https://myaccount.google.com/apppasswords
- Update `.env`:
  ```ini
  MAIL_HOST=smtp.gmail.com
  MAIL_PORT=587
  MAIL_USERNAME=your-email@gmail.com
  MAIL_PASSWORD=your-app-password
  MAIL_ENCRYPTION=tls
  ```

**Also update:**
```ini
ADMIN_EMAIL=your-email@example.com
SITE_URL=http://localhost/Ux/Ux-Academy-
```

### Step 3: Test It!

1. Open: `http://localhost/Ux/Ux-Academy-/index.php`
2. Click "Register Now" (in hero section) or go to Contact page
3. Fill form and submit
4. Should see: **"Thank you! Your message has been received"**
5. **Check email inbox** - email should arrive in 5-30 seconds

---

## 📁 Project Structure (Simplified)

```
/Ux-Academy-/
├── /backend/              # Form submission handlers
│   ├── contact_handler.php    # Main form processor
│   ├── security.php           # CSRF, validation
│   ├── validation.php         # Field checks
│   ├── mailer.php             # Email sending
│   └── .htaccess              # Security
├── /includes/             # Reusable PHP components
│   ├── config.php             # Setup, sessions
│   ├── head.php               # Page header
│   ├── navbar.php             # Navigation
│   └── footer.php             # Footer
├── /logs/                 # Activity logs (auto-created)
├── /css/                  # Styling
├── /js/                   # JavaScript (with AJAX)
├── /img/                  # Images
├── .env                   # Configuration (IMPORTANT!)
├── index.php              # Home page
├── contact.php            # Contact form
├── cources.php            # Courses
├── career.php             # Careers
├── apply.php              # Application form
├── terms.php              # Terms
└── privacy.php            # Privacy
```

---

## 🔐 Security Features (All Included)

✅ **CSRF Protection** - Prevents unauthorized form submissions
✅ **Input Validation** - Checks all fields server-side
✅ **Input Sanitization** - Removes dangerous characters
✅ **XSS Prevention** - Escapes all outputs
✅ **Rate Limiting** - Max 1 submission per minute per IP
✅ **Error Logging** - Saves to `/logs/activity.log`

---

## 📋 What Forms Do

### Contact Form (`/contact.php`)
- **Fields:** Name, Email, Phone, Subject, Message
- **Action:** Sends email to ADMIN_EMAIL and confirmation to user
- **Response:** Success/error message (no page reload)

### Application Form (Hero on index.php)
- **Fields:** Full Name, Email, Phone, Program, Message
- **Action:** Sends email notification
- **Response:** Modal shows success message

### Other Forms
- Same pattern: Submit → Validate → Send Email → Show Success

---

## 🧪 Test Scenarios

### ✅ Test 1: Valid Submission
```
1. Go to http://localhost/Ux/Ux-Academy-/contact.php
2. Fill all fields with valid data
3. Click "Submit"
4. See green success message
5. Check email inbox (should arrive in 5-30 sec)
```

### ✅ Test 2: Validation Error
```
1. Leave "Name" empty
2. Click "Submit"
3. Red error: "Name is required"
4. Fill Name field
5. Submit again - should work
```

### ✅ Test 3: Invalid Email
```
1. Enter "not-an-email" in Email field
2. Click "Submit"
3. Red error: "Please enter a valid email address"
```

### ✅ Test 4: Rate Limiting
```
1. Submit form successfully
2. Immediately submit again
3. Error: "You are submitting too frequently"
4. Wait 1 minute
5. Submit again - works!
```

### ✅ Test 5: Responsive Design
```
- Open on desktop, tablet, mobile
- Text, images, buttons should resize
- Forms should be readable on all sizes
```

---

## 📧 Testing Email (Using Mailtrap)

1. **After form submission**, go to https://mailtrap.io/
2. **Login** to your account
3. **Open the Inbox** you configured
4. **You should see 2 emails:**
   - Email to admin (contains form data)
   - Confirmation email to user

---

## 🐛 Troubleshooting

### "Page Won't Load"
- Open browser console (F12)
- Check for error messages
- Ensure Apache is running in XAMPP
- Verify SITE_URL in `.env` matches your path

### "Form Submits But No Success Message"
- Check browser console (F12) → Network tab
- Look for errors on `/backend/contact_handler.php`
- Verify CSRF token is in form

### "Email Not Arriving"
**If using Mailtrap:**
- Check Mailtrap inbox (not spam folder)
- Verify Mail settings match exactly
- Check PHP error log

**If using Gmail:**
- Verify app-specific password is correct
- Check Gmail "Access for less secure apps"

**If using php mail():**
- May not work on all servers
- Try Mailtrap instead

### "Images Not Loading"
- Images use dynamic SITE_URL path
- Verify SITE_URL in `.env` is correct
- Check `/img/` directory exists with images

### "CSS/Styling Broken"
- Browser cache issue
- Clear cache: Ctrl+Shift+Del
- Hard refresh: Ctrl+F5

---

## 📊 How It Works

```
User fills form
        ↓
Click "Submit"
        ↓
Browser validates (HTML5)
        ↓
JavaScript prevents page reload (AJAX)
        ↓
Data sent to /backend/contact_handler.php
        ↓
PHP Server validates fields
        ↓
Checks CSRF token
        ↓
Checks rate limit (1/min per IP)
        ↓
If valid:
   → Send email to admin
   → Send confirmation to user
   → Return success (JSON)
        ↓
If errors:
   → Return error messages (JSON)
        ↓
JavaScript updates page:
   → Show success/error message
   → Enable/disable button
   → Reset form (if success)
```

**No page reload. No database. Just emails.** ✉️

---

## 📱 All Pages

| Page | URL | Purpose |
|------|-----|---------|
| Home | `/index.php` | Hero + registration modal |
| Contact | `/contact.php` | Contact form |
| Courses | `/cources.php` | Course listings |
| Career | `/career.php` | Job opportunities |
| Apply | `/apply.php` | Application form |
| Terms | `/terms.php` | Terms of service |
| Privacy | `/privacy.php` | Privacy policy |

---

## 🔧 Configuration Summary

**Required Changes to `.env`:**
1. Email provider (Mailtrap/Gmail/mail())
2. ADMIN_EMAIL (where emails go)
3. SITE_URL (if not localhost)

**That's it!** No database, no MySQL, no complex setup.

---

## ✅ Verification Checklist

Before going live:

- [ ] Access all pages without errors
- [ ] Contact form submits
- [ ] Receive email in inbox
- [ ] Confirmation email arrives
- [ ] Validation errors show properly
- [ ] Rate limiting works (wait 1 min)
- [ ] Mobile responsive
- [ ] All images load
- [ ] CSS styling looks correct
- [ ] Test on multiple browsers

---

## 📝 Activity Logs

Forms submissions and events are logged to `/logs/activity.log`.

To view logs:
```
c:\xampp\htdocs\Ux\Ux-Academy-\logs\activity.log
```

Example log entry:
```
[2026-04-11 14:30:15] [contact_form_submitted] Name: John Doe, Email: john@example.com (IP: 127.0.0.1)
```

---

## 🚀 Production Deployment

When deploying to live server:

1. Update `.env`:
   ```ini
   SITE_URL=https://yourDomain.com
   ENVIRONMENT=production
   DEBUG=false
   ```

2. Configure real SMTP email (not Mailtrap)

3. Ensure server supports PHP 7.0+

4. Set proper file permissions:
   ```bash
   chmod 755 /logs/
   chmod 644 /logs/activity.log
   ```

5. Enable HTTPS/SSL

6. Test forms end-to-end

---

## 📞 Support

**Issues?**

1. Check browser console (F12) for error messages
2. Review `/logs/activity.log` for server-side issues
3. Verify `.env` email settings match exactly
4. Test email settings on Mailtrap dashboard
5. Ensure Apache is running in XAMPP

---

## 🎉 You're Done!

Your website is now a working PHP system with:
- ✅ Email notifications
- ✅ Form validation
- ✅ Security (CSRF, XSS protection)
- ✅ Rate limiting
- ✅ No database needed
- ✅ 5-minute setup

**Ready to test?** Go to `http://localhost/Ux/Ux-Academy-/index.php`

Submit a form and check your email! 📧
