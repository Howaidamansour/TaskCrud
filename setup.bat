@echo off

echo Running composer install...
cmd /c "composer install"
if %errorlevel% neq 0 (
    echo Composer install failed.
)

echo Generating application key...
cmd /c "php artisan key:generate"
if %errorlevel% neq 0 (
    echo Key generation failed.
)

echo Running migrations...
cmd /c "php artisan migrate"
if %errorlevel% neq 0 (
    echo Migrations failed.
)

echo Creating storage symbolic link...
cmd /c "php artisan storage:link"
if %errorlevel% neq 0 (
    echo Storage link failed.
)

echo Seeding the database...
cmd /c "php artisan db:seed"
if %errorlevel% neq 0 (
    echo Database seeding failed.
)

echo Installing npm dependencies...
cmd /c "npm install"
if %errorlevel% neq 0 (
    echo Npm install failed.
)

echo Running npm dev build...
cmd /c "npm run dev"
if %errorlevel% neq 0 (
    echo Npm run dev failed.
)

echo Setup complete!
pause
