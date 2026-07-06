
// admin.js
console.log("admin.js loaded");

function search() {
    var input = document.getElementById("search");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("table");
    var tr = table.getElementsByTagName("tr");
    for (var i = 1; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName("td");
        var found = false;
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                var textvalue = td[j].textContent || td[j].innerText;
                if (textvalue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        tr[i].style.display = found ? "" : "none";
    }
}

function filterTable() {
    var filterValue = document.getElementById("statusFilter").value.toLowerCase().trim();
    var table = document.getElementById("table");
    var tr = table.getElementsByTagName("tr");
    for (var i = 1; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName("td")[7]; // status col index
        if (td) {
            var status = (td.textContent || td.innerText).toLowerCase().trim();
            if (filterValue === "all" || status === filterValue) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById("search");
    var statusSelect = document.getElementById("statusFilter");
    var envelope = document.getElementById("envelopeIcon");

    if (searchInput) {
        searchInput.addEventListener("keyup", search);
    }
    if (statusSelect) {
        var urlParams = new URLSearchParams(window.location.search);
        var filterParam = urlParams.get('filter');

        if (filterParam && ['new', 'completed', 'cancelled', 'all'].includes(filterParam.toLowerCase())) {
            statusSelect.value = filterParam.toLowerCase();
        } else {
            statusSelect.value = "all";  // default to All
        }
        filterTable();

        statusSelect.addEventListener("change", filterTable);
    }
   if (envelope) {
    envelope.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("Envelope clicked - filtering new requests");
        document.getElementById("statusFilter").value = "NEW";
        filterTable();
    });
}

}
);