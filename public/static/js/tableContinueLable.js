/**
 *  INH Template left right code
 */

var INHTablerows = document.querySelectorAll(".inhsetting1");

INHTablerows.forEach(function (row) {
    if (typeof(ro) != "undefined")
    {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = row.className +" "+  (onLeftPage ? "inhsettingLeft" : "inhsettingRight");
    }
 });

/**
 *  End - HYD Hose left right code
 */

var HYDHoseRows = document.querySelectorAll(".productHeadingProductPage");
HYDHoseRows.forEach(function (row) {
    if (typeof(ro) != "undefined")
    {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = onLeftPage ? "leftpHeadingSection" : "rightpHeadingSection";
    }
});


/**
 *  End - HYD Fitting left right code
 */

var HYDFittingRows = document.querySelectorAll(".headingSection");
HYDFittingRows.forEach(function (row) {
    if (typeof(ro) != "undefined")
    {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = onLeftPage ? "fittingLeftHeadingSection" : "fittingRightHeadingSection";
    }
});


/**
 *  Table Continue Label Code
 */

var CONTINUED_TEXT = "Continued on the next page";
var currentPage = 0;

// iterate over tables
var tables = document.getElementsByClassName("continueLable");
// console.log("tables-"+tables.length);

for (var i = 0; i < tables.length; i++) {
    var table = tables[i];

    if(table)
    {
    //     CONTINUED_TEXT2 = (table.getAttribute("data-brandname"));

        // determine number of columns
        var cells = table.querySelectorAll("tbody tr:last-child td");
        // var cells = table.firstElementChild.querySelectorAll("tr:first-child td");
        var colspan = cells.length;

        // for (var i = 0; i < cells.length; i++) {
        //     var cellColspan = parseInt(cells[i].getAttribute("colspan"));

        //     if (cellColspan) {
        //         colspan += cellColspan - 1;
        //         // console.log("colspan-"+colspan);
        //     }
        // }
        // console.log("colspan-"+colspan);

        // iterate over rows
        var rows = table.querySelectorAll("tbody tr");

        for (var j = 0; j < rows.length; j++) {
            var row = rows[j];

            if (typeof(ro) != "undefined")
            {
                var bd = ro.layout.getBoxDescriptions(row);

                if (bd) {
                    // check if a page break occurs
                    if (bd[0].pageIndex > currentPage) {
                        let p = (bd[0].pageIndex > currentPage);

                       
                        let p1 = bd[0].pageIndex +" "+currentPage;
                        currentPage = bd[0].pageIndex;
                        if (j > 0) {
                        
                            var previousRow = rows[j - 1];
                            // create a new row
                            var continueRow = document.createElement("tr");
                            var continueCell = document.createElement("td");
                            continueCell.setAttribute("colspan", colspan);
                            // continueCell.textContent = CONTINUED_TEXT+" "+p+" "+p1+" "+rows.length+" "+ j;
                            continueCell.textContent = CONTINUED_TEXT;

                            continueCell.className = "continueRow";
                            // continueRow.className = "continueRow";
                            continueRow.appendChild(continueCell);
                            if(previousRow.querySelector('td').innerHTML != CONTINUED_TEXT){

                            previousRow.parentNode.insertBefore(continueRow, previousRow);
                            }
                        }
                    }
                }
            }
        }
    }
}