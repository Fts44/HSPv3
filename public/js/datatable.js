//set datatable
// const datatable = $('#datatable').DataTable({
//     rowReorder: {
//         selector: 'td:nth-child(2)'
//     },
    
//     responsive: true,
//     scrollX: true,
//     processing: true,
//     dom: 'lfrtipB',
//     "lengthMenu": [10, 25, 50, 100],
//     pageLength: 10,
//     buttons: [
//         'csv', 'excel',
//         {
//             extend: 'pdfHtml5',
//             orientation: 'landscape',
//             pageSize: 'LEGAL',
//             customize : function(doc){
//                 var colCount = new Array();
//                 $('#datatable').find('tbody tr:first-child td').each(function(){
//                     if($(this).attr('colspan')){
//                         for(var i=1;i<=$(this).attr('colspan');$i++){
//                             colCount.push('*');
//                         }
//                     }else{ colCount.push('*'); }
//                 });
//                 doc.content[1].table.widths = colCount;
//             }
//         }
//     ]
// });

// datatable.buttons().container().appendTo( $('.col-sm-6:eq(0)', datatable.table().container() ) );

// //if the section change width fixed column by aligning the action col to asc
// let resize_observer = new ResizeObserver(function() {
//     datatable.order([[ $('#datatable tr th').length-1, 'asc']]).draw();
// });

// resize_observer.observe($("#card-table")[0]);

function datatable_class(table_id){
    //set datatable
    let datatableClass = $(table_id).DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        pageLength: 10,
        responsive: true,
        scrollX: true,
        processing: true,
        dom: 'lfrtipB',
        "lengthMenu": [10, 25, 50, 100],
        buttons: [
            'csv', 'excel',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                customize : function(doc){
                    var colCount = new Array();
                    $(table_id).find('tbody tr:first-child td').each(function(){
                        if($(this).attr('colspan')){
                            for(var i=1;i<=$(this).attr('colspan');$i++){
                                colCount.push('*');
                            }
                        }
                        else{ 
                            colCount.push('*'); 
                        }
                    });
                    doc.content[1].table.widths = colCount;
                }
            }
        ]
    });
   
}

function datatable_no_btn_class(table_class){
    let datatableClass = $(table_class).DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        pageLength: 10,
        responsive: true,
        scrollX: true,
        processing: true
    });
}

function redraw_datatable_class(table_class){
    let table = $(table_class).DataTable();
    table.columns.adjust().draw();
}

function resize_adjust_datatable(table_class){
    let th = table_class+' tr th';
    datatable.order([[ $(th).length-1, 'asc']]).draw();
}