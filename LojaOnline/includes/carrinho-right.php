<div class="flex-item" id="flex-right">
    <div class="shopping_cart">
        <p class="carrinho_title">
            Carrinho
        </p>
        <div class="carrinho_details">
            <?php total_itens_cart(); ?>&nbsp;item(s) 
            <br>
            <hr class="hr-carrinho">
            <p class="total-carrinho">Total</p> <span class="price"><?php preco_final(); ?>
        </div>
        <div class="carrinho_icon">
            <a href="cart.php">
                <img src="img/header/carrinho_black.png">
            </a>
        </div>
    </div>  
</div>
