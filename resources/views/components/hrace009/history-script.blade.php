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
