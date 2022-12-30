const filterCompanyId = document.getElementById("filter_company_id");
document.querySelectorAll(".btn-delete").forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();
        if (confirm("Are you sure?")) {
            const action = this.getAttribute("href");
            const form = document.getElementById("form-delete");
            form.setAttribute("action", action);
            form.submit();
        }
    });
});

if (filterCompanyId) {
    filterCompanyId.addEventListener("change", (event) => {
        const companyId = event.target.value || 0;
        const url = `${
            window.location.href.split("?")[0]
        }?company_id=${companyId}`;
        window.location.href = url;
    });
}

const searchClearBtn = document.getElementById("btn-clear");
if (searchClearBtn) {
    searchClearBtn.addEventListener("click", () => {
        const input = document.getElementById("search"),
            select = document.getElementById("filter_company_id");

        if (input) input.value = "";
        if (select) select.selectedIndex = 0;

        window.location.href = window.location.href.split("?")[0];
    });
}

const flashMessage = document.getElementById("flash-message");
if (flashMessage) {
    setTimeout(() => {
        flashMessage.remove();
    }, 3000);
}

function toggleClearBtn() {
    const query = window.location.search,
        pattern = /[?&]search=./;

    if (!searchClearBtn) return;
    if (pattern.test(query)) {
        searchClearBtn.style.display = "block";
    } else {
        searchClearBtn.style.display = "none";
    }
}

toggleClearBtn();
