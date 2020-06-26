{{-- relationships with pivot table (n-n) --}}
@php
    $results = data_get($entry, $column['name']);
@endphp

<span>
    <?php
        if ($results && $results->count()) {
            $results_array = $results->pluck($column['attribute']);
            $myArray = $results_array->toArray();
            //echo implode(', ', $results_array->toArray());
            foreach ($results_array as $item) {
                echo "<span>".$item->formuleQuantity()."</span> <br>";
                echo '<div style="padding-left: 10px">';
                    foreach ($item->produitsDuFormule() as $produit) {
                        echo "<h6>".$produit->nom."</h6>";
                    }
                echo "</div>";
            }
        } else {
            echo '-';
        }
    ?>
</span>
