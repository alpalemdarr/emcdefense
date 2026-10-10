<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – EMC Defense</title>
    <link rel="icon" href="{{ asset('images/logo_icon.png') }}" type="image/png">

    <!-- Fonts & Bootstrap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --brand-primary: #1E2D7D;
            --brand-hover: #15225E;
            --brand-soft: #2563EB;
            --brand-light: #EFF6FF;
            --brand-border: #DBEAFE;
            --border-color: #E2E8F0;
            --border-med: #CBD5E1;
            --text-main: #0F172A;
            --text-body: #334155;
            --text-muted: #64748B;
        }

        * { box-sizing: border-box; }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
            background-image: 
                radial-gradient(circle at 50% 25%, rgba(30, 45, 125, 0.05) 0%, transparent 65%),
                linear-gradient(180deg, #F8FAFC 0%, #EFF6FF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* ── 3D HERO CANVAS BACKGROUND ── */
        #hero-canvas,
        .hero-3d-canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        /* Ambient Defense Grid Underlay */
        .ambient-grid {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(30, 45, 125, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 45, 125, 0.025) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 2;
        }

        /* ── GLASSMORPHIC LOGIN CARD ── */
        .login-card {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 22px;
            padding: 2.75rem 2.5rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 
                0 25px 60px -15px rgba(15, 23, 42, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.8),
                0 8px 24px -4px rgba(30, 45, 125, 0.06);
            position: relative;
            z-index: 10;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            box-shadow: 
                0 30px 70px -15px rgba(15, 23, 42, 0.16),
                0 0 0 1px rgba(255, 255, 255, 0.9),
                0 12px 30px -4px rgba(30, 45, 125, 0.09);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo img {
            max-height: 52px;
            margin-bottom: 1.15rem;
            filter: drop-shadow(0 2px 8px rgba(30, 45, 125, 0.12));
        }

        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: #EFF6FF;
            color: #1E2D7D;
            border: 1px solid #DBEAFE;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 0.25rem 0.65rem;
            border-radius: 20px;
            margin-bottom: 0.75rem;
        }

        .security-badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #2563EB;
            box-shadow: 0 0 6px rgba(37, 99, 235, 0.8);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.85); }
        }

        .login-title {
            color: var(--text-main);
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 0.35rem;
        }

        .login-subtitle {
            color: var(--text-muted);
            font-size: 0.86rem;
            margin-bottom: 0;
        }

        .form-label {
            color: var(--text-body);
            font-size: 0.84rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
        }

        .input-group-text {
            background: #F8FAFC;
            border: 1.5px solid var(--border-med);
            border-right: none;
            color: var(--brand-primary);
            border-radius: 10px 0 0 10px;
            font-size: 1.05rem;
            transition: all 0.2s ease;
        }

        .form-control {
            background: #FFFFFF;
            border: 1.5px solid var(--border-med);
            border-left: none;
            color: var(--text-main);
            border-radius: 0 10px 10px 0;
            padding: 0.75rem 1rem;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background: #FFFFFF;
            border-color: var(--brand-primary);
            box-shadow: none;
            color: var(--text-main);
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--brand-primary);
            background: #EFF6FF;
            color: var(--brand-primary);
        }

        .form-check-label {
            color: var(--text-muted);
            font-size: 0.84rem;
            font-weight: 500;
        }

        .form-check-input {
            background-color: #FFFFFF;
            border-color: var(--border-med);
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--brand-primary);
            border-color: var(--brand-primary);
        }

        .btn-submit {
            background: var(--brand-primary);
            border: 1px solid var(--brand-primary);
            color: #FFFFFF;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.85rem;
            border-radius: 10px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.25s ease;
            margin-top: 1.5rem;
            box-shadow: 0 4px 14px rgba(30, 45, 125, 0.22);
        }

        .btn-submit:hover {
            background: var(--brand-hover);
            border-color: var(--brand-hover);
            box-shadow: 0 8px 24px rgba(30, 45, 125, 0.32);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .back-link {
            text-align: center;
            margin-top: 1.75rem;
        }

        .back-link a {
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .back-link a:hover {
            color: var(--brand-primary);
        }
    </style>
</head>
<body>

    <!-- 3D ELECTROMAGNETIC FARADAY LATTICE CANVAS -->
    <canvas id="hero-canvas" class="hero-3d-canvas"></canvas>

    <!-- AMBIENT DEFENSE GRID -->
    <div class="ambient-grid"></div>

    <!-- GLASSMORPHIC LOGIN CONTAINER -->
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('images/logo.png') }}" alt="EMC Defense">
            <br>
            <div class="security-badge">
                <span class="dot"></span>
                <span>Security Clearance Level 4</span>
            </div>
            <h1 class="login-title">Control Panel</h1>
            <p class="login-subtitle">Sign in to manage EMC Defense website</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2 px-3 mb-4 rounded-3 border-0 bg-danger text-white small" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="email">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="admin@emcdefence.com" value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-submit">
                <span>Sign In to Dashboard</span>
                <i class="bi bi-arrow-right"></i>
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}">
                <i class="bi bi-arrow-left"></i>
                <span>Return to Public Website</span>
            </a>
        </div>
    </div>

    <!-- ── 3D ELECTROMAGNETIC WAVE & FARADAY SHIELDING LATTICE SCRIPT ── -->
    <script>
    (function() {
        const canvas = document.getElementById('hero-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');

        let W, H;
        const dpr = Math.min(window.devicePixelRatio || 1, 2);

        function resize() {
            const w = window.innerWidth;
            const h = window.innerHeight;
            W = canvas.width = w * dpr;
            H = canvas.height = h * dpr;
            canvas.style.width = w + 'px';
            canvas.style.height = h + 'px';
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.scale(dpr, dpr);
        }
        resize();

        // 3D Grid Parameters (Topological RF Shielding Lattice)
        const cols = 36;
        const rows = 26;
        const spacingX = 64;
        const spacingZ = 52;
        const fov = 520;

        let rotX = 0.44;
        let rotY = 0.04;
        let targetRotX = 0.44;
        let targetRotY = 0.04;
        let time = 0;

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Mouse Parallax & Dynamic RF Wave Ripple
        let mouse = { x: 0, y: 0, targetX: 0, targetY: 0, active: false };
        window.addEventListener('mousemove', e => {
            const nx = e.clientX / window.innerWidth - 0.5;
            const ny = e.clientY / window.innerHeight - 0.5;
            targetRotY = nx * 0.26;
            targetRotX = 0.44 + ny * 0.18;
            mouse.targetX = e.clientX;
            mouse.targetY = e.clientY;
            mouse.active = true;
        }, { passive: true });

        window.addEventListener('mouseleave', () => {
            targetRotX = 0.44;
            targetRotY = 0.04;
            mouse.active = false;
        });

        function renderFrame() {
            time += 0.018;
            rotX += (targetRotX - rotX) * 0.05;
            rotY += (targetRotY - rotY) * 0.05;
            mouse.x += (mouse.targetX - mouse.x) * 0.08;
            mouse.y += (mouse.targetY - mouse.y) * 0.08;

            const w = window.innerWidth;
            const h = window.innerHeight;
            ctx.clearRect(0, 0, w, h);

            const cameraY = Math.max(120, h * 0.22);
            const cameraZ = 560;
            const waveAmp = 1.0;

            const points = [];
            const cosY = Math.cos(rotY), sinY = Math.sin(rotY);
            const cosX = Math.cos(rotX), sinX = Math.sin(rotX);

            // Compute 3D Coordinates & Wave Function
            for (let r = 0; r < rows; r++) {
                points[r] = [];
                for (let c = 0; c < cols; c++) {
                    const rawX = (c - cols / 2) * spacingX;
                    const rawZ = (r - rows / 2) * spacingZ;

                    const distCenter = Math.sqrt(rawX * rawX + rawZ * rawZ);
                    let rawY = (Math.sin(distCenter * 0.006 - time * 1.5) * 24
                             + Math.cos(rawX * 0.005 + time * 1.1) * 16
                             + Math.sin(rawZ * 0.007 - time * 0.8) * 12) * waveAmp;

                    if (mouse.active) {
                        const dM = Math.hypot(rawX, rawZ);
                        if (dM < 300) {
                            rawY += Math.sin((dM * 0.03) - time * 4) * (24 * waveAmp * (1 - dM / 300));
                        }
                    }

                    // 3D Euler Transformation
                    const x1 = rawX * cosY - rawZ * sinY;
                    const z1 = rawX * sinY + rawZ * cosY;

                    const y2 = rawY * cosX - z1 * sinX - cameraY;
                    const z2 = rawY * sinX + z1 * cosX + cameraZ;

                    if (z2 > 15) {
                        const scale = fov / z2;
                        const sx = w / 2 + x1 * scale;
                        const sy = h / 2 + y2 * scale;
                        const depth = Math.max(0, Math.min(1, (z2 - 120) / 880));
                        points[r][c] = { sx, sy, z: z2, depth, waveHeight: rawY };
                    } else {
                        points[r][c] = null;
                    }
                }
            }

            // Draw Lattice Connecting Lines (Horizontal & Depth)
            ctx.lineWidth = 1;

            // 1. Horizontal curves
            for (let r = 0; r < rows; r++) {
                for (let c = 0; c < cols - 1; c++) {
                    const p1 = points[r][c];
                    const p2 = points[r][c + 1];
                    if (p1 && p2) {
                        const avgDepth = (p1.depth + p2.depth) / 2;
                        const alpha = (1 - avgDepth) * 0.24 + 0.03;
                        ctx.strokeStyle = `rgba(30, 45, 125, ${alpha.toFixed(3)})`;
                        ctx.beginPath();
                        ctx.moveTo(p1.sx, p1.sy);
                        ctx.lineTo(p2.sx, p2.sy);
                        ctx.stroke();
                    }
                }
            }

            // 2. Depth curves (columns)
            for (let c = 0; c < cols; c++) {
                for (let r = 0; r < rows - 1; r++) {
                    const p1 = points[r][c];
                    const p2 = points[r + 1][c];
                    if (p1 && p2) {
                        const avgDepth = (p1.depth + p2.depth) / 2;
                        const alpha = (1 - avgDepth) * 0.20 + 0.025;
                        ctx.strokeStyle = `rgba(37, 99, 235, ${alpha.toFixed(3)})`;
                        ctx.beginPath();
                        ctx.moveTo(p1.sx, p1.sy);
                        ctx.lineTo(p2.sx, p2.sy);
                        ctx.stroke();
                    }
                }
            }

            // 3. Faraday Shielding Polyhedron Nodes
            for (let r = 0; r < rows; r++) {
                for (let c = 0; c < cols; c++) {
                    if ((r % 2 === 0 && c % 2 === 0) || points[r][c]?.waveHeight > 24) {
                        const p = points[r][c];
                        if (p) {
                            const alpha = (1 - p.depth) * 0.48;
                            const size = (1 - p.depth) * 3.2 + 1.2;

                            if (p.waveHeight > 20) {
                                const pulse = (Math.sin(time * 3 + r + c) + 1) * 0.5;
                                ctx.beginPath();
                                ctx.arc(p.sx, p.sy, size + pulse * 4.5, 0, Math.PI * 2);
                                ctx.strokeStyle = `rgba(37, 99, 235, ${(alpha * 0.38).toFixed(3)})`;
                                ctx.lineWidth = 0.75;
                                ctx.stroke();
                            }

                            ctx.fillStyle = `rgba(30, 45, 125, ${alpha.toFixed(3)})`;
                            ctx.beginPath();
                            ctx.arc(p.sx, p.sy, size * 0.75, 0, Math.PI * 2);
                            ctx.fill();
                        }
                    }
                }
            }

            // 4. Military CAD HUD Coordinates & Precision Crosshairs
            if (w >= 900 && h >= 400) {
                ctx.font = "600 11px 'JetBrains Mono', monospace";
                ctx.fillStyle = "rgba(30, 45, 125, 0.36)";

                ctx.fillText("[SECURE GATEWAY // MIL-STD-461G / EN 55032]", 36, 42);
                ctx.fillText("GRID_SEC // 40.758°N 30.015°E (KARTEPE FACILITY)", 36, 60);

                const strRight1 = "ADMIN AUTHENTICATION PORTAL";
                const strRight2 = "FARADAY LATTICE ATTENUATION: > 120 dB";
                ctx.fillText(strRight1, w - ctx.measureText(strRight1).width - 36, 42);
                ctx.fillText(strRight2, w - ctx.measureText(strRight2).width - 36, 60);
            }

            const drawCross = (cx, cy) => {
                ctx.strokeStyle = "rgba(30, 45, 125, 0.28)";
                ctx.lineWidth = 1;
                ctx.beginPath();
                ctx.moveTo(cx - 7, cy); ctx.lineTo(cx + 7, cy);
                ctx.moveTo(cx, cy - 7); ctx.lineTo(cx, cy + 7);
                ctx.stroke();
            };

            if (h >= 300) {
                drawCross(36, 80);
                drawCross(w - 36, 80);
                drawCross(36, h - 36);
                drawCross(w - 36, h - 36);
            }

            if (!prefersReducedMotion) {
                requestAnimationFrame(renderFrame);
            }
        }

        window.addEventListener('resize', resize, { passive: true });
        requestAnimationFrame(renderFrame);
    })();
    </script>
</body>
</html>
