const canvas = document.getElementById('fireworks');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let fireworks = [];

const colors = [
    '#ffcc73',
    '#ffd700',
    '#ff5733',
    '#ff2e63',
    '#00e5ff',
    '#7cff6b',
    '#ffffff'
];

class Particle {
    constructor(x, y, color) {
        this.x = x;
        this.y = y;
        this.color = color;

        const angle = Math.random() * Math.PI * 2;
        const speed = Math.random() * 20 + 2;

        this.velocity = {
            x: Math.cos(angle) * speed,
            y: Math.sin(angle) * speed
        };

        this.alpha = 1;
        this.friction = 0.97;
        this.gravity = 0.04;
    }

    draw() {
        ctx.save();
        ctx.globalAlpha = this.alpha;
        ctx.beginPath();
        ctx.arc(this.x, this.y, 2.5, 0, Math.PI * 2);
        ctx.fillStyle = this.color;
        ctx.shadowBlur = 15;
        ctx.shadowColor = this.color;
        ctx.fill();
        ctx.restore();
    }

    update() {
        this.velocity.x *= this.friction;
        this.velocity.y *= this.friction;
        this.velocity.y += this.gravity;

        this.x += this.velocity.x;
        this.y += this.velocity.y;

        this.alpha -= 0.015;

        this.draw();
    }
}

class Firework {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = canvas.height;
        this.targetY = Math.random() * canvas.height * 0.45 + 60;
        this.color = colors[Math.floor(Math.random() * colors.length)];

        this.velocity = {
            x: 0,
            y: -Math.random() * 4 - 6
        };

        this.particles = [];
        this.hasExploded = false;
    }

    drawRocket() {
        ctx.save();
        ctx.beginPath();
        ctx.arc(this.x, this.y, 3, 0, Math.PI * 2);
        ctx.fillStyle = this.color;
        ctx.shadowBlur = 20;
        ctx.shadowColor = this.color;
        ctx.fill();
        ctx.restore();
    }

    explode() {
        for (let i = 0; i < 70; i++) {
            this.particles.push(new Particle(this.x, this.y, this.color));
        }

        this.hasExploded = true;
    }

    update() {
        if (!this.hasExploded) {
            this.y += this.velocity.y;
            this.drawRocket();

            if (this.y <= this.targetY) {
                this.explode();
            }
        }

        for (let i = this.particles.length - 1; i >= 0; i--) {
            this.particles[i].update();

            if (this.particles[i].alpha <= 0) {
                this.particles.splice(i, 1);
            }
        }
    }
}

function animate() {
    requestAnimationFrame(animate);

    ctx.fillStyle = 'rgba(9, 3, 3, 0.18)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    if (Math.random() < 0.05) {
        fireworks.push(new Firework());
    }

    for (let i = fireworks.length - 1; i >= 0; i--) {
        fireworks[i].update();

        if (fireworks[i].hasExploded && fireworks[i].particles.length === 0) {
            fireworks.splice(i, 1);
        }
    }
}

window.addEventListener('resize', function () {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

animate();
