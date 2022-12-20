document
    .getElementById("filter_company_id")
    .addEventListener("change", (event) => {
        const companyId = event.target.value || 0;
        const url = `${
            window.location.href.split("?")[0]
        }?company_id=${companyId}`;
        window.location.href = url;
    });
