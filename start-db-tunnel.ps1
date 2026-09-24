param(
    [int]$LocalPort = 3307
)

$ErrorActionPreference = 'Stop'

$sshKeyPath = 'C:\Users\user\Downloads\id_ed25519'

if (-not (Test-Path -LiteralPath $sshKeyPath)) {
    throw "SSH key was not found at $sshKeyPath"
}

Write-Host "Opening database tunnel on 127.0.0.1:$LocalPort. Keep this window open while using the app."

& ssh `
    -i $sshKeyPath `
    -p 22 `
    -N `
    -L "${LocalPort}:127.0.0.1:3306" `
    -o ExitOnForwardFailure=yes `
    -o ServerAliveInterval=60 `
    baptiste@5.189.188.129

if ($LASTEXITCODE -ne 0) {
    throw "SSH tunnel exited with code $LASTEXITCODE"
}

