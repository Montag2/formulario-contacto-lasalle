</main>

    <!-- Script del fondo animado (Canvas) -->
    <script>
        const c = document.getElementById("fondo");
        const $ = c.getContext('2d');
        let w = c.width = window.innerWidth;
        let h = c.height = window.innerHeight;
        let lines = [];
        const lineCount = 50;

        function init() {
            for (let i = 0; i < lineCount; i++) {
                lines.push(new Line());
            }
            stage();
            loop();
        }

        function stage() {
            w = c.width = window.innerWidth;
            h = c.height = window.innerHeight;
            // Fondo base oscuro
            $.fillStyle = '#05101e';
            $.fillRect(0, 0, w, h);
        }

        function Line() {
            this.location = {
                x: Math.random() * w,
                y: Math.random() * h
            };
            this.width = Math.random() * 1.5 + 0.5;
            
            // Genera tonos de azul (Hue entre 200 y 230)
            let hue = Math.floor(Math.random() * 30) + 200;
            this.color = `hsla(${hue}, 90%, 65%, 0.85)`;
        }

        function draw() {
            // Efecto de rastro
            $.fillStyle = 'rgba(5, 16, 30, 0.05)'; 
            $.fillRect(0, 0, w, h);
            
            for (let i = 0; i < lines.length; i++) {
                let l = lines[i],
                    a = ~~(Math.random() * 4) * 90,
                    lL = Math.random() * 15 + 5;
                    
                $.lineWidth = l.width;
                $.strokeStyle = l.color;
                $.beginPath();
                $.moveTo(l.location.x, l.location.y);
                
                switch(a) {
                    case 0:
                        l.location.y -= lL;
                        break;
                    case 90:
                        l.location.x += lL;
                        break;
                    case 180:
                        l.location.y += lL;
                        break;
                    case 270:
                        l.location.x -= lL;
                        break;
                }
                $.lineTo(l.location.x, l.location.y);
                
                // Reaparición si sale de la pantalla
                if (l.location.x < 0 || l.location.x > w) l.location.x = Math.random() * w;
                if (l.location.y < 0 || l.location.y > h) l.location.y = Math.random() * h;
                
                $.stroke();
            }
        }

        function loop() {
            draw();
            requestAnimationFrame(loop);
        }

        window.addEventListener('resize', stage);

        init();
    </script>
</body>
</html>