# Script para preparar el proyecto antes del deployment
Write-Host "=== Preparando proyecto Tech Home Books para deployment ===" -ForegroundColor Green

# 1. Instalar dependencias de Node
Write-Host "`n[1/6] Instalando dependencias de Node..." -ForegroundColor Cyan
npm install

# 2. Compilar assets para producción
Write-Host "`n[2/6] Compilando assets para producción..." -ForegroundColor Cyan
npm run build

# 3. Limpiar cachés
Write-Host "`n[3/6] Limpiando cachés..." -ForegroundColor Cyan
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 4. Optimizar para producción
Write-Host "`n[4/6] Optimizando para producción..." -ForegroundColor Cyan
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# 5. Verificar archivos importantes
Write-Host "`n[5/6] Verificando archivos importantes..." -ForegroundColor Cyan

$archivosNecesarios = @(
    ".env",
    "composer.json",
    "package.json",
    "public/index.php",
    "artisan"
)

foreach ($archivo in $archivosNecesarios) {
    if (Test-Path $archivo) {
        Write-Host "  ✓ $archivo existe" -ForegroundColor Green
    } else {
        Write-Host "  ✗ $archivo NO EXISTE - ADVERTENCIA" -ForegroundColor Red
    }
}

# 6. Mostrar resumen
Write-Host "`n[6/6] Resumen de preparación:" -ForegroundColor Cyan
Write-Host "  ✓ Assets compilados en public/build/" -ForegroundColor Green
Write-Host "  ✓ Cachés optimizados" -ForegroundColor Green
Write-Host "  ✓ Configuración lista para producción" -ForegroundColor Green

Write-Host "`n=== IMPORTANTE: Antes de subir al servidor ===" -ForegroundColor Yellow
Write-Host "1. NO subas la carpeta node_modules/ (muy pesada)" -ForegroundColor Yellow
Write-Host "2. NO subas la carpeta .git/" -ForegroundColor Yellow
Write-Host "3. Configura el .env directamente en el servidor" -ForegroundColor Yellow
Write-Host "4. Asegúrate de subir la carpeta vendor/ completa" -ForegroundColor Yellow
Write-Host "5. Revisa DEPLOYMENT.md para instrucciones completas" -ForegroundColor Yellow

Write-Host "`n=== Preparación completada ===" -ForegroundColor Green
Write-Host "Puedes proceder a subir los archivos via FileZilla" -ForegroundColor Green
