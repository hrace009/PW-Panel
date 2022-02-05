<script>
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }

        const getColor = () => {
            if (window.localStorage.getItem('color')) {
                return window.localStorage.getItem('color')
            }
            return 'cyan'
        }

        const setColors = (color) => {
            const root = document.documentElement
            root.style.setProperty('--color-primary', `var(--color-${color})`)
            root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
            root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
            root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
            root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
            root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
            root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
            this.selectedColor = color
            window.localStorage.setItem('color', color)
        }

        return {
            loading: true,
            isDark: getTheme(),
            color: getColor(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            setColors,
        }
    }
</script>
