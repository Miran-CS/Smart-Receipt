# Smart Chicken Receipt System

A secure chicken receipt management system with backend authentication.

## Security Features

✅ **Backend Authentication** - Password never stored in frontend  
✅ **PHP Password Hashing** - Secure password hashing with bcrypt  
✅ **API-based Login** - No client-side password validation  
✅ **Session Management** - Secure session handling  
✅ **Security Headers** - Protection against common attacks  

## Setup Instructions

### Option 1: PHP Backend (Recommended)

1. **Install PHP**: Make sure you have PHP installed on your system
2. **Web Server**: Use a local web server like XAMPP, WAMP, or built-in PHP server
3. **Start Server**: Run one of these commands in your project directory:

```bash
# Using PHP built-in server
php -S localhost:8000

# Or if you have XAMPP/WAMP, place files in htdocs/www folder
```

4. **Access Application**: Open your browser and go to:
   - `http://localhost:8000` (if using PHP built-in server)
   - `http://localhost/your-project-folder` (if using XAMPP/WAMP)

### Option 2: Node.js Backend (Advanced)

If you prefer Node.js:

1. **Install Node.js**: Download and install Node.js from nodejs.org
2. **Install Dependencies**: `npm install`
3. **Start Server**: `npm start`
4. **Access**: `http://localhost:3000`

## Login Credentials

- **Username**: MiranCS
- **Password**: 558858

## How to Change Password

### For PHP Backend:
Edit the `login.php` or `login_secure.php` file:

```php
// Change these lines
$correctUsername = 'MiranCS';
$correctPassword = 'YOUR_NEW_PASSWORD';
```

### For Node.js Backend:
Edit the `server.js` file:

```javascript
// Change this line
const plainPassword = "YOUR_NEW_PASSWORD";
```

## Security Benefits

1. **No Password in Frontend**: The password is never visible in browser developer tools
2. **Server-side Validation**: All authentication happens on the server
3. **Password Hashing**: Passwords are securely hashed using bcrypt
4. **Session Management**: Secure session handling for logged-in users
5. **Security Headers**: Protection against XSS, clickjacking, and other attacks

## File Structure

```
├── index.html              # Main application interface
├── login.php               # PHP authentication backend
├── login_secure.php        # Enhanced secure PHP backend
├── server.js               # Node.js backend (alternative)
├── package.json            # Node.js dependencies
├── Mreshk.JPG             # Application image
└── README.md              # This file
```

## Production Deployment

For production, consider:
- Using HTTPS
- Setting up environment variables for sensitive data
- Using a proper web server (Apache/Nginx)
- Setting up proper logging and monitoring
- Implementing rate limiting
- Using a database for user management

## Troubleshooting

### PHP Issues:
- Make sure PHP is installed and in your PATH
- Check that your web server supports PHP
- Verify file permissions are correct

### Node.js Issues:
- Ensure Node.js is installed (`node --version`)
- Run `npm install` to install dependencies
- Check that port 3000 is not in use 