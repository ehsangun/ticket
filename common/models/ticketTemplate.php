
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php
$isAnswered=1;
//isAnswered hamoon is answered toye db hastesh

?>
<div class="row">
<div class="col-md-4">
<div class="card border-primary text-center">
    <div class="card-header">subject</div>
    <div class="product">
        <ul class="list-group bg-success">
            <li class="list-group-item <?php if($isAnswered){?>bg-success<?php }?>">p1</li>
            <li class="list-group-item <?php if($isAnswered){?>bg-success<?php }?>">p1</li>
            <li class="list-group-item <?php if($isAnswered){?>bg-success<?php }?>">p1</li>
        </ul>
    </div>
    <div class="card-body ">
        <div class="description">
            <p class="card-text">description</p>
        </div>
    </div>
    <a href="#">
        <h1 class="card-footer">
            answer
        </h1>
    </a>
</div>
</div>
    </div>






