@call %~dp0/_init.bat

FOR /f "usebackq tokens=* delims=" %%A in (`docker-compose ps -q php`) do @set "containter_id=%%A"
docker cp %containter_id%:/var/www/html/vendor ./

@cd %start_path%
