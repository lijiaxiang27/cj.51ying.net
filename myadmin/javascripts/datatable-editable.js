function restoreRow ( oTable, nRow )
{
  var aData = oTable.fnGetData(nRow);
  var jqTds = $('>td', nRow);
  
  for ( var i=0, iLen=jqTds.length ; i<iLen ; i++ ) {
    oTable.fnUpdate( aData[i], nRow, i, false );
  }
  
  oTable.fnDraw();
}

function editRow ( oTable, nRow )
{
  var aData = oTable.fnGetData(nRow);
  var jqTds = $('>td', nRow);
  jqTds[2].innerHTML = '<input type="text" value="'+aData[2]+'">';
  jqTds[4].innerHTML = '<a class="edit-row" href="javascript:void(0)"><i class="icon-save"></i></a><a class="table-actions" href="#"><i class="icon-trash"></i></a>';
}
function editRow2 ( oTable, nRow )
{
  var aData = oTable.fnGetData(nRow);
  var jqTds = $('>td', nRow);
  jqTds[0].innerHTML = '<input type="text" value="'+aData[0]+'">';
  jqTds[1].innerHTML = '<input type="text" value="'+aData[1]+'">';
  jqTds[2].innerHTML = '<input type="text" value="'+aData[2]+'">';
  jqTds[3].innerHTML = '<a class="edit-row" href="javascript:void(0)"><i class="icon-save"></i></a><a class="table-actions" href="#"><i class="icon-trash"></i></a>';
}
function saveRow2 ( oTable, nRow )
{
  var jqInputs = $('input', nRow);
  var aData = oTable.fnGetData(nRow);
  var jqTds = $('>td', nRow);
  if(jqInputs[0].value && jqInputs[1].value &&jqInputs[2].value){
  $.get("shady.php", { do: "shadyadd", cid:jqInputs[0].value,phone:jqInputs[1].value,grade:jqInputs[2].value},
  function(data){
    oTable.fnUpdate( jqInputs[0].value, nRow, 0, false );
    oTable.fnUpdate( jqInputs[1].value, nRow, 1, false );
    oTable.fnUpdate( jqInputs[2].value, nRow, 2, false );
    oTable.fnUpdate( '<a class="edit-row" href="javascript:void(0)"><i class="icon-pencil"></i></a><a class="table-actions" href="#"><i class="icon-trash"></i></a>', nRow, 3, false );
    oTable.fnDraw();
  });
  }else{
    alert('这三个空都为必填字段，请认真填写！');
    }
}

function saveRow ( oTable, nRow )
{
  var jqInputs = $('input', nRow);
  var aData = oTable.fnGetData(nRow);
  var jqTds = $('>td', nRow);
  $.get("shenhe.do.php", { do: "toupiao", cid:jqTds[1].innerHTML ,name:jqInputs[1].value},
  function(data){
	  oTable.fnUpdate( jqInputs[1].value, nRow, 2, false );
	  oTable.fnUpdate( '<a class="edit-row" href="javascript:void(0)"><i class="icon-pencil"></i></a><a class="table-actions" href="#"><i class="icon-trash"></i></a>', nRow, 4, false );
	  oTable.fnDraw();
  });
}

$(document).ready(function() {
  var oTable = $("#datatable-editable").dataTable({
    "sPaginationType": "full_numbers",
    aoColumnDefs: [
      {
        bSortable: false,
        aTargets: [-1, 0]
      }
    ]
  });
  var oTable2 = $("#datatable-shady").dataTable({
    "sPaginationType": "full_numbers",
    aoColumnDefs: [
      {
        bSortable: false,
        aTargets: [-1, 0]
      }
    ]
  });

  var nEditing = null;

  $('#add-row').click( function (e) {
    e.preventDefault();

    // var aiNew = oTable.fnAddData( [ '', '', '', '', '',
    //   '<a class="edit-row" href="javascript:void(0)">Edit</a>', '<a class="delete-row" href="javascript:void(0)">Delete</a>' ] );
    // var nRow = oTable.fnGetNodes( aiNew[0] );
    // editRow( oTable, nRow );

     var aiNew = oTable2.fnAddData( [ '', '', '',
      '<a class="edit-row" href="javascript:void(0)"><i class="icon-pencil"></i></a><a class="table-actions" href="javascript:void(0)"><i class="icon-trash"></i></a>' ] );
    var nRow = oTable2.fnGetNodes( aiNew[0] );
    editRow2( oTable2, nRow );

    nEditing = nRow;
  } );

  $('#datatable-shady').on('click', 'a.delete-row', function (e) {
    e.preventDefault();

    var nRow = $(this).parents('tr')[0];
    var jqTds = $('>td', nRow);
    $.get("shady.php", { do: "shadydel", cid:$(jqTds[0]).text()},function(data){
                oTable2.fnDeleteRow( nRow );

  });

  } );

  $('#datatable-shady').on('click', 'a.edit-row', function (e) {
    e.preventDefault();

    /* Get the row as a parent of the link that was clicked on */
    var nRow = $(this).parents('tr')[0];

    if ( nEditing !== null && nEditing != nRow ) {
      /* Currently editing - but not this row - restore the old before continuing to edit mode */
      restoreRow( oTable2, nEditing );
      editRow2( oTable2, nRow );
      nEditing = nRow;
    }
    else if ( nEditing == nRow && this.innerHTML =='<i class="icon-save"></i>' ) {
      /* Editing this row and want to save it */
      saveRow2( oTable2, nEditing );
      nEditing = null;
    }
    else {
      /* No edit in progress - let's start one */
      editRow2( oTable2, nRow );
      nEditing = nRow;
    }
  } );
  
  $('#datatable-editable').on('click', 'a.delete-row', function (e) {
    e.preventDefault();

    var nRow = $(this).parents('tr')[0];
    oTable.fnDeleteRow( nRow );
  } );

  $('#datatable-editable').on('click', 'a.edit-row', function (e) {
    e.preventDefault();

    /* Get the row as a parent of the link that was clicked on */
    var nRow = $(this).parents('tr')[0];

    if ( nEditing !== null && nEditing != nRow ) {
      /* Currently editing - but not this row - restore the old before continuing to edit mode */
      restoreRow( oTable, nEditing );
      editRow( oTable, nRow );
      nEditing = nRow;
    }
    else if ( nEditing == nRow && this.innerHTML =='<i class="icon-save"></i>' ) {
      /* Editing this row and want to save it */
      saveRow( oTable, nEditing );
      nEditing = null;
    }
    else {
      /* No edit in progress - let's start one */
      editRow( oTable, nRow );
      nEditing = nRow;
    }
  } );
} );
