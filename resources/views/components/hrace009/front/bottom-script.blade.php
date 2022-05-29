@livewireScripts
<script src="{{asset('js/kamona-wd.js')}}"></script>
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
            //
        }

        const updateBarChart = (on) => {
            const data = {
                data: randomData(),
                backgroundColor: 'rgb(207, 250, 254)',
            }
            if (on) {
                barChart.data.datasets.push(data)
                barChart.update()
            } else {
                barChart.data.datasets.splice(1)
                barChart.update()
            }
        }

        const updateDoughnutChart = (on) => {
            const data = random()
            const color = 'rgb(207, 250, 254)'
            if (on) {
                doughnutChart.data.labels.unshift('Seb')
                doughnutChart.data.datasets[0].data.unshift(data)
                doughnutChart.data.datasets[0].backgroundColor.unshift(color)
                doughnutChart.update()
            } else {
                doughnutChart.data.labels.splice(0, 1)
                doughnutChart.data.datasets[0].data.splice(0, 1)
                doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
                doughnutChart.update()
            }
        }

        const updateLineChart = () => {
            lineChart.data.datasets[0].data.reverse()
            lineChart.update()
        }

        return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            setLightTheme() {
                this.isDark = false
                setTheme(this.isDark)
            },
            setDarkTheme() {
                this.isDark = true
                setTheme(this.isDark)
            },
            color: getColor(),
            selectedColor: 'cyan',
            setColors,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
                this.isSettingsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.settingsPanel.focus()
                })
            },
            isNotificationsPanelOpen: false,
            openNotificationsPanel() {
                this.isNotificationsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.notificationsPanel.focus()
                })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
                this.isSearchPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.searchInput.focus()
                })
            },
            isMobileSubMenuOpen: false,
            openMobileSubMenu() {
                this.isMobileSubMenuOpen = true
                this.$nextTick(() => {
                    this.$refs.mobileSubMenu.focus()
                })
            },
            isMobileMainMenuOpen: false,
            openMobileMainMenu() {
                this.isMobileMainMenuOpen = true
                this.$nextTick(() => {
                    this.$refs.mobileMainMenu.focus()
                })
            },
            updateBarChart,
            updateDoughnutChart,
            updateLineChart,
        }
    }

    /* Make dynamic date appear */
    (function () {
        if (document.getElementById("get-current-year")) {
            document.getElementById(
                "get-current-year"
            ).innerHTML = new Date().getFullYear();
        }
    })();

    /* Make dynamic copyright appear */
    (function () {
        if (document.getElementById("copyright-by")) {
            document.getElementById(
                "copyright-by"
            ).innerHTML = "Harris Marfel";
        }
    })();
</script>
<x-hrace009::flash-message/>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });

        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
</script>
@if( request()->routeIs('news.create') || request()->routeIs('news.edit') || request()->routeIs('shop.create') || request()->routeIs('shop.edit') )
    <script>
        tinymce.init({
            @if( request()->routeIs('news.create') || request()->routeIs('news.edit')  )
            selector: 'textarea.content',
            @endif

                @if( request()->routeIs('shop.create') || request()->routeIs('shop.edit')  )
            selector: 'textarea.description',
            @endif
            relative_urls: false,
            remove_script_host: false,
            document_base_url: '{{ config('app.url') }}',
            height: 300,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

            image_title: true,
            automatic_uploads: true,
            @if( request()->routeIs('news.create') || request()->routeIs('news.edit')  )
            images_upload_url: '{{ route('admin.news.upload') }}',
            @endif
                @if( request()->routeIs('shop.create') || request()->routeIs('shop.edit')  )
            images_upload_url: '{{ route('admin.shop.upload') }}',
            @endif
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                };
                input.click();
            }
        });
    </script>
@endif
@include('popper::assets')
@if( request()->routeIs('admin.chat.watch') )
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(function () {
            if ($('#live_chat tbody:empty')) {
                loadLogs();
            }
        });
        $("#chat_refresh").click(function () {
            loadLogs();
        });

        function loadLogs() {
            $('#chat_refresh').prop('disabled', true);
            $('#chat_refresh').html("{{ __('manage.loading') }}");
            $('#live_chat tbody').empty();
            $.ajax({
                method: 'post',
                url: '{{ route('admin.chat.postLogs') }}',
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function (r) {
                    for (var i = 0; i < r.length; i++) {
                        $('#live_chat tbody').append("<tr class='border-b dark:border-primary-light " + r[i].row_color + "'><td>" + r[i].date + "</td><td>" + r[i].uid + "</td><td>" + r[i].channel + "</td><td>" + r[i].dest + "</td><td>" + r[i].msg + "</td></tr>");
                    }
                    $("tbody.reverse").each(function (elem, index) {
                        var arr = $.makeArray($("tr", this).detach());
                        arr.reverse();
                        $(this).append(arr);
                    });
                    $("#chat_refresh").prop('disabled', false);
                    $("#chat_refresh").html("<span class='icon-refresh'></span> {{ __('manage.buttons.refresh') }}");
                },
                error: function (e) {

                }
            });
        }
    </script>
@endif
@if( request()->routeIs('app.donate.history') )
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        let tabsContainer = document.querySelector("#tabs");
        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);
        tabTogglers.forEach(function (toggler) {
            toggler.addEventListener("click", function (e) {
                e.preventDefault();
                let tabName = this.getAttribute("href");
                let tabContents = document.querySelector("#tab-contents");
                for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("dark:border-primary", "border-b", "border-b-2", "-mb-px", "opacity-100", "border-l", "border-t", "border-r", "rounded-t", "bg-gray-50", "dark:bg-primary");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");
                }
                e.target.parentElement.classList.add("dark:border-primary", "border-b", "-mb-px", "opacity-100", "border-l", "border-t", "border-r", "rounded-t", "bg-gray-50", "dark:bg-primary");
            });
        });
        document.getElementById("default-tab").click();
    </script>
@endif
