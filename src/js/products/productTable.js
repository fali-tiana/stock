$(document).ready(function () {
  // initializing datatable:
  $("#myDataTable").DataTable();

  // manipulating the feather icons
  feather.replace();
  feather.icons.eye.toSvg({ class: "text-neutral-800" });
});
