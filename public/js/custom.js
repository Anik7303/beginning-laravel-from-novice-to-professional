document.querySelectorAll(".btn-delete").forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();
        if (confirm("Are you sure")) {
            const url = this.getAttribute("href");
            const deleteForm = document.getElementById("delete-form");
            if (deleteForm) {
                deleteForm.setAttribute("action", url);
                deleteForm.submit();
            }
        }
    });
});

const companyFilter = document.getElementById("filter-company");
if (companyFilter) {
    companyFilter.addEventListener("change", function (event) {
        const companyId = event.target.value;
        const baseUrl = window.location.href.split("?")[0];
        window.location.href = `${baseUrl}?company_id=${companyId}`;
    });
}

const searchInput = document.getElementById("search-input");
const searchButton = document.getElementById("search-button");
if (searchButton) {
    searchButton.addEventListener("click", function () {
        if (searchInput) {
            const value = searchInput.nodeValue || searchInput.value;
            if (!value) return;
            const [baseUrl, searchPart = ""] = window.location.href.split("?");
            const pattern = /search=/;
            const searchTerms = searchPart ? searchPart.split("&") : [];
            const filteredTerms = pattern.test(searchPart)
                ? searchTerms.filter((term) => !pattern.test(term))
                : searchTerms;
            const terms = [...filteredTerms, `search=${value}`].join("&");
            const url = `${baseUrl}?${terms}`;
            window.location.href = url;
        }
    });
}

const resetButton = document.getElementById("reset-button");
if (resetButton) {
    resetButton.addEventListener("click", function () {
        if (searchInput) searchInput.value = "";
        if (companyFilter) companyFilter.selectedIndex = 0;
        window.location.href = window.location.href.split("?")[0];
    });
}

function toggleResetButton() {
    if (!resetButton) return;
    const pattern = /[?&]search=/;
    console.log(pattern.test(window.location.href));
    if (pattern.test(window.location.href)) {
        resetButton.style.display = "block";
    } else {
        resetButton.style.display = "none";
    }
}
toggleResetButton();
