<?php include 'filesLogic.php';
include 'functions.php';
 if(isset($_POST['search']))
 {
     $valueToSearch = $_POST['valueToSearch'];
     // search in all table columns
     // using concat mysql function
     $query = "SELECT * FROM `files` WHERE CONCAT(`id`, `name`, `size`, `downloads`, `Cliente`) LIKE '%".$valueToSearch."%'";
     $search_result = filterTable($query);
     
 }
  else {
     $query = "SELECT * FROM `files`";
     $search_result = filterTable($query);
 }
 
 // function to connect and execute the query
 function filterTable($query)
 {
     $connect = mysqli_connect("localhost", "root", "", "file-management");
     $filter_Result = mysqli_query($connect, $query);
     return $filter_Result;
 }
 
 
 
// conta do diretorio fots
$dir = getcwd();
 
// Inicializa a conta  0
$i = 0;
 
if( $handle = opendir($dir) ) {
     
    while( ($file = readdir($handle)) !== false ) {
        if( !in_array($file, array('.', '..')) && !is_dir($dir.$file))
            $i++;
    }
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
	  
	  <!-- remove this if you use Modernizr -->
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|s)no-js(s|$)/,"$1js$2")})(document,window,0);</script>
	
	
	 <!-- Links para o modal input de inserir -->
	

	   
	  
	   <!-- Links para o modal input de inserir -->
	  
    <!-- Liks style for input file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
   
	  
	  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		  
    </script>
   
	    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <!-- CSS DO MODAL DELETE -->
	  <link rel="stylesheet" href="modaldeletefinal.css">
	  
	  
	   <!-- Acaba Aqui -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" href="style.css">
	
	  
    <title>Files Upload and Download</title>
  </head>
  <body>
  
	  
	  

	  
	  
	  
	   
	  
	  
	  
	  
	  
	
	   <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
			<div class=" conteudo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Arquivo </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="corpo">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h2> Tem certeza que quer excluir esse arquivo ??</h2>
                    </div>
                    <div class="modalpe">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Não </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Sim !! Apague isso. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
	  </div>
	  
	   <!-- DELETE POP UP FORM (Bootstrap MODAL) END -->
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <script>



$(document).ready(function(){
  
  $('label[for=checkbox]').on('click', function(){
    alert('write here code');
window.location.href= 'http://www.rohitazad.com';
  });
  
  $('label[for=checkbox]').on('click', function(){
    alert('write here code 2');
window.location.href= 'http://www.rohitazad.com';
  });
  
  
});


</script>
	  
	  
	  
	  
	  
	  
	  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">CodingLab</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="procurar...">
         <span class="tooltip">Procurar</span>
      </li>
      <li>
        <a href="#">
          <img src="imagens/botao-home.png">
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Pagina Inicial</span>
      </li>
      <li>
       <a href="#">
         <img src="imagens/add.png">
         <span class="links_name">Anexar</span>
       </a>
       <span class="tooltip">Anexar Arquivos</span>
     </li>
     <li>
       <a href="#">
         <img src="imagens/lapis.png">
         <span class="links_name">Cadastrar</span>
       </a>
       <span class="tooltip">Cadastrar Clientes</span>
     </li>
     <li>
       <a href="#">
         <img src="imagens/grafico-de-pizza.png">
         <span class="links_name">Graficos</span>
       </a>
       <span class="tooltip">Graficos</span>
     </li>
     <li>
       <a href="#">
       <img src="imagens/lista-de-papel.png">
         <span class="links_name">Lista</span>
       </a>
       <span class="tooltip">Lista de Clientes</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Enviar Email</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">Dashboard</div>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>  
	  
	  
	  
	  
	  
	  
	  
	  
	
	  
	  
	  
	  
	  
	  <div class="fundo">
	  
	  
	  
    
    <div class="container">
      <div class="row">

		  <!-- Input para o modal testando -->
		  
		  
		  
	
		  
		  
		  
		  <!-- Input para o modal testando -->
		  
		
		  
      
        <form action="enviar.php" method="post" enctype="multipart/form-data" >
			<div class="texto">  
				<h3>Enviar Arquivo</h3> 
			</div>
         
          <div class="txt_field">
          <label>Nome Completo</label>
          <input type="text" required  name="FileName" placeholder="Digite o nome do cliente..." >
          <span></span>
			  <div class="image-upload">
       
				  
				  <label for="myfile">
    <img src="uploads/pasta (2).png" />
  </label>
				  
				  
				  
				  
          <input type="file" name="myfile" id="myfile" > <br>
				  </div>
			  <div class="botao">
          <button type="submit"  name="save">Anexar  <img src="uploads/em-anexo.png"> </button>
        </form>
			 
      </div>
    </div>
			
		</div>		  
		
     <div class="search-box">
	 <button class="btn-search"><img src="uploads/search.png" alt=""></img></button>
	 
     <input class="input-search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Procurar..">
	   
</div>
		  
		  
		
 				
		  
		  
		  

     <table width="126%" id ="myTable">

    
<thead>
<div class="espaconome">
	 <th >ID</th>
    <th >Nome</th>
	</div>
    <th >Arquivo</th>
    <th width="341">Tamanho(em mb)</th>
    <th>Downloads</th>
    <th>Opções</th>
	<th>Quantidade</th>
	
    
</thead>
<tbody>

  <?php foreach ($files as $file  ): 
    
    $fileExt = pathinfo($file['name'])['extension'];
    $fileTypeImages = array("docx" => "docx.png", "jpg" => "photo icon.png","jpeg" => "photo icon.png", "png" => "photo icon.png",  "pdf" => "pdf.png","zip" => "rar.png");
    ?>
    
    
    <tr class ="header">
      <td> <?php echo $file['id']; ?> </td>
    
    <td align="center"><?php echo $file['Cliente']; ?></td>
      
      
      
      <td align="center"><img src="uploads/<?php echo $fileTypeImages[$fileExt]; ?>" alt=""></img><br> <?php echo $file['name']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      
    <td  width="1000%" align="center" ><a href="downloads.php?file_id=<?php echo $file['id'] ?>"> <img alt="" src="uploads/download.png"
    > </a>  <button type="button" class="btn btn-danger deletebtn"> Excluir </button>
        </td>
   
         <td><?php echo "$i files"; ?></td>
	
  
  </tr>
  
  <?php endforeach;?>
  
  

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
</tbody>
</table>
</div>




<script>
	
	
	
	$(document).ready(function(){
  
  $('label[for=checkbox]').on('click', function(){
    alert('write here code');
window.location.href= 'http://www.rohitazad.com';
  });
  
  $('label[for=checkbox]').on('click', function(){
    alert('write here code 2');
window.location.href= 'http://www.rohitazad.com';
  });
  
  
});
	
	
	
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
	  

    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>




  <!-- Script para o modal delete -->

	

	
	
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#fname').val(data[1]);
                $('#lname').val(data[2]);
                $('#course').val(data[3]);
                $('#contact').val(data[4]);
            });
        });
    </script>
	
	
	
	
	 <!-- script para o modal delete -->



<footer>
        <div class="footer-content">
            <h3>Foolish Developer</h3>
            <p>Raj Template is a blog website where you will find great tutorials on web design and development. Here each tutorial is beautifully described step by step with the required source code.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">Foolish Developer</a>  </p>
                    <div class="footer-menu">
                      <ul class="f-menu">
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Blog</a></li>
                      </ul>
                    </div>
        </div>

    </footer>
 





<div class="fimpagina">
<h1> um bom jeito de terminar</h1>

</div>


<!-- MODAL PARA INCLUIR ARQUIVOS -->

	

	
  </body>
</html>