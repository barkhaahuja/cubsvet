<?php foreach ((range(1,$carousel_indicators['pages'])?:array()) as $indicator): ?>
    <?php if ($indicator <= $carousel_indicators['active']): ?>
        
            <li class="active"></li>
            
        
        <?php else: ?>
            <li></li>
            
        
    <?php endif; ?>
<?php endforeach; ?>
