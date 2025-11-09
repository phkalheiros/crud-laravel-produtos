<!doctype html>
 <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="#">
    <title > crud laravel - frameworks e  design  patterns</title>           

      
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    @yield('styles') 
    
    <link  href="..\..\css\app.css" rel="stylesheet">

   
   </head>
  <body>
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    @yield('scripts')
  

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
     <a class="navbar-brand" href="#">Produtos</a>
     <button class="navbar-toggler-icon" type="button" data-toggle="collepse" data-target="#navbarsexempleDefault">
      <span class="navbar-toggler-icon"></span>
    </button>
     
     <div class="collepse navbar-collepse" id="navbarsExampleDefault"
       <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
           <a class="nav-link href="{{route('produtos.index')}}">Home</a>
      </li>
     </ul>
     </div>

  
  </nav>
    
    <main role="main" class="container" style="margin-top: 60px;">
        <div class="template">
          <div class="container">
            @yield ('content')
          </div>S
        </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
    crossorigin="anonymous">
</script>

<script>
    window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"><\/script>');
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" 
    integrity="sha384-w1Q4orYjBQndcko6Km1tE4i4g2FpMsHw8Hh7s5t6k6/g2tX3U/K1l5s5T5n5B0p" 
    crossorigin="anonymous">
</script>

  

  
    </body>
</html>