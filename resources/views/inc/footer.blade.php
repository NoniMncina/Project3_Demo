<footer class="page-footer black darken-4">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Boxed</h5>
        <p class="grey-text text-lighten-4">Document Management System</p>
      </div>
    </div>
  </div>
  <div class="footer-copyright black darken-3">
    <div class="container">
    © {{ Date('Y') }} Copyright @ N.Mncina
    <a class="grey-text text-lighten-4 right modal-trigger" href="#modal2">Help</a>
    </div>
  </div>
</footer>
<!-- Modal For Help -->
<div id="modal2" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>Help</h4>
    <p>
      File Location
      <br>
          This box allows you to browse your local computer to find a file. Click 
          the "Browse..." button to bring up a popup prompt. Navigate to your file, 
          then click "Open". Once you have done this, the location of your file should 
          show up in the text box, and you can continue to fill out the rest of the 
          form.
        <br>
        <br>
      Category
      <br>
          This box allows you to define which category your document corresponds
          to. Make sure this fits, because many people will search for documents based 
          on this field.
        <br>
        <br>
      Department
      <br>
          This box allows you to define, for each department, the corresponding access 
          rights you want users to have. 
        <br>
        <br>
      Authority
      <br>
          This box allows you to define a specific type of access for departments,
          including 
        <br>
        <br>          
      Description
      <br>
          This box allows you to attach a short description to the file, which
          will be used in the file listings, and also during searches. Try to be as
          precise as possible. 
          <br>
          <br>
      Note: There is also an "All departments" field, which you can use to set 
      all the departments to the same, whether it be admin, read, view, etc..<br>
      You may also notice as you are setting permissions that you can go "back" 
      to another department, and the settings are retained.
    </p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
  </div>
</div>
