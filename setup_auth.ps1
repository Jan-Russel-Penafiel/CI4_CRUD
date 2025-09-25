# Database Setup Script for Authentication System
# Run this script to create the users table and set up authentication

Write-Host "=== CodeIgniter 4 Authentication Setup ===" -ForegroundColor Green
Write-Host ""

# Change to project directory
cd "c:\xampp\htdocs\ci4_BSIT3A"

Write-Host "Running database migration to create users table..." -ForegroundColor Yellow

# Run the migration
php spark migrate

Write-Host ""
Write-Host "=== Setup Complete! ===" -ForegroundColor Green
Write-Host ""
Write-Host "🎉 Authentication system is now ready!" -ForegroundColor Cyan
Write-Host ""
Write-Host "📝 What was created:" -ForegroundColor White
Write-Host "   ✅ UserModel.php - Handles user authentication and registration" -ForegroundColor Gray
Write-Host "   ✅ AuthController.php - Manages login, registration, and logout" -ForegroundColor Gray
Write-Host "   ✅ register.php - Registration page view" -ForegroundColor Gray
Write-Host "   ✅ Updated login form in index.php" -ForegroundColor Gray
Write-Host "   ✅ Database migration for users table" -ForegroundColor Gray
Write-Host "   ✅ Updated routes configuration" -ForegroundColor Gray
Write-Host ""
Write-Host "🔐 Default Admin Credentials:" -ForegroundColor White
Write-Host "   Username: admin" -ForegroundColor Yellow
Write-Host "   Password: admin123" -ForegroundColor Yellow
Write-Host ""
Write-Host "🌐 Available URLs:" -ForegroundColor White
Write-Host "   Login:        http://localhost/ci4_BSIT3A/auth/login" -ForegroundColor Cyan
Write-Host "   Register:     http://localhost/ci4_BSIT3A/auth/register" -ForegroundColor Cyan
Write-Host "   Dashboard:    http://localhost/ci4_BSIT3A/" -ForegroundColor Cyan
Write-Host ""
Write-Host "📖 Features:" -ForegroundColor White
Write-Host "   • Secure password hashing" -ForegroundColor Gray
Write-Host "   • Session-based authentication" -ForegroundColor Gray
Write-Host "   • Form validation with error messages" -ForegroundColor Gray
Write-Host "   • CSRF protection" -ForegroundColor Gray
Write-Host "   • User registration system" -ForegroundColor Gray
Write-Host "   • Responsive design matching your existing theme" -ForegroundColor Gray
Write-Host ""
Write-Host "Ready to use! 🚀" -ForegroundColor Green