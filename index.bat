@echo off
net stop "wampapache64"
net start "wampapache64"
start http://127.0.0.1/waibao/index.php/Manager/Trigger/index
ping -n 10 127.0.0.1>nul
taskkill /f /im  "MicrosoftEdge.exe" /T