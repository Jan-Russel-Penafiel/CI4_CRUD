# Admin Login Credentials

## Administrator Access

### Login Information
- **Username:** `admin`
- **Password:** `admin123`

### Access Details
- **Login URL:** `http://localhost/ci4_BSIT3A/auth/login` or `http://localhost/ci4_BSIT3A/login`
- **Landing Page:** Products Management (`index.php`)
- **Session Type:** Admin session (user_id: 0, is_admin: true)

## Features After Login

### Admin Dashboard
After successful login, the admin will be redirected to the **Products Management** page (`index.php`) where they can:

1. **View Products List**
   - See all products in a paginated table
   - View product images, names, descriptions, prices, and stock
   - Real-time data updates

2. **Product Management**
   - Create new products (with image upload)
   - Edit existing products (update details and images)
   - Delete products (soft delete to trash)
   - View product details

3. **Bulk Operations**
   - Select multiple products
   - Bulk delete to trash
   - Bulk restore from trash
   - Bulk permanent delete

4. **Search & Filter**
   - Search products by name or description
   - Filter results in real-time

5. **Trash Management**
   - View deleted products
   - Restore products from trash
   - Permanently delete products

6. **Statistics & Reports**
   - View product statistics
   - Export data to CSV
   - Print product lists

7. **Image Management**
   - Upload product images (JPG, PNG, GIF)
   - View product images in thumbnails
   - Maximum file size: 2MB

## Login Process

### Step 1: Access Login Page
Navigate to: `http://localhost/ci4_BSIT3A/auth/login`

### Step 2: Enter Credentials
```
Username: admin
Password: admin123
```

### Step 3: Submit
Click "Sign In" button

### Step 4: Redirected
You will be automatically redirected to the Products Management page

## Session Management

### Session Data Stored
```php
[
    'user_id' => 0,           // Admin has ID 0
    'username' => 'admin',
    'is_admin' => true,       // Admin flag
    'logged_in' => true,
    'login_time' => timestamp,
    'last_activity' => timestamp
]
```

### Session Security
- Sessions are stored server-side
- Automatic session timeout on inactivity
- Session validation on each request
- Logout clears all session data

## Logout

### How to Logout
Click the "Logout" button in the header navigation

### Logout URL
`http://localhost/ci4_BSIT3A/auth/logout` or `http://localhost/ci4_BSIT3A/logout`

### After Logout
You will be redirected back to the login page with a success message

## User vs Admin

### Regular Users
- Created automatically after POS checkout
- Username format: `user_XXXXXXXX` (from phone number)
- Auto-generated secure password
- Access to: User Dashboard, Profile, Transactions, Product Catalog (read-only)
- Landing page: `user/dashboard`

### Admin Account
- Hardcoded credentials (username: admin, password: admin123)
- Access to: Full product management, CRUD operations, statistics
- Landing page: Products Management (`index.php`)
- Special admin flag in session

## Security Notes

### Important
⚠️ **Change the admin password in production!**

The current admin credentials are hardcoded for development purposes:
- File: `app/Controllers/AuthController.php`
- Lines: Check for `$username === 'admin' && $password === 'admin123'`

### For Production
1. Store admin credentials in environment variables
2. Use stronger password requirements
3. Implement two-factor authentication
4. Add rate limiting for login attempts
5. Log all admin activities

## Troubleshooting

### Cannot Login
1. Check database connection
2. Verify session configuration
3. Check `writable` folder permissions
4. Clear browser cache and cookies
5. Check server error logs

### Redirected to Login After Login
1. Check session configuration in `app/Config/Session.php`
2. Verify `writable/session` folder is writable
3. Check PHP session settings
4. Verify cookies are enabled in browser

### Session Expires Too Quickly
Adjust session timeout in `app/Config/Session.php`:
```php
public int $expiration = 7200; // 2 hours
```

## Quick Reference

| Item | Value |
|------|-------|
| Username | admin |
| Password | admin123 |
| Login URL | /auth/login |
| Landing Page | / (Products Management) |
| User ID | 0 |
| Admin Flag | true |
| Session Key | logged_in |

---

**Last Updated:** January 2025  
**System:** CodeIgniter 4 POS System  
**Developer:** Jan Russel E. Peñafiel
