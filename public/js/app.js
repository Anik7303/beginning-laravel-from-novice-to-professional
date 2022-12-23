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

document.getElementById("btn-clear").addEventListener("click", () => {
    const input = document.getElementById("search"),
        select = document.getElementById("filter_company_id");

    input.value = "";
    select.selectedIndex = 0;

    window.location.href = window.location.href.split("?")[0];
});

function toggleClearBtn() {
    const query = window.location.search,
        pattern = /[?&]search=./,
        button = document.getElementById("btn-clear");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
}

toggleClearBtn();
