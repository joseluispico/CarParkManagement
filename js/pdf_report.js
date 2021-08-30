jQuery(function($) {
    $("#exportToButton").click(function() {
        var dataSource = shield.DataSource.create({
            data: "#myreport",
            schema: {
                type: "table",
                fields: {
                    Ticket: { type: String },
                    Auto: { type: String },
                    Placa: { type: String },
                    Tipo: { type: String },
                    Hora_Entrada: { type: Number },
                    Hora_Salida: { type: Number },
                    Total: { type: Number }
                }
            }
        });

        dataSource.read().then(function(data) {
            var pdf = new shield.exp.PDFDocument({
                author: "Devnote",
                created: new Date()
            });

            pdf.addPage("a4", "portrait");

            pdf.table(
                50,
                50,
                data, [
                    { field: "Ticket", title: "Ticket", width: 200 },
                    { field: "Auto", title: "Auto", width: 50 },
                    { field: "Placa", title: "Placa", width: 50 },
                    { field: "Tipo", title: "Tipo", width: 50 },
                    { field: "Hora_Entrada", title: "Hora Entrada", width: 50 },
                    { field: "Hora_Salida", title: "Hora Salida", width: 50 },
                    { field: "Total", title: "Total", width: 50 }
                ], {
                    margins: {
                        top: 50,
                        left: 50
                    }
                }
            );

            pdf.saveAs({
                fileName: "exportToPdf"
            });
        });
    });
});