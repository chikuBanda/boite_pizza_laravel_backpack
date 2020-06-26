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
            foreach ($myArray as $item) {
                echo "<span>".$item."</span> <br>";
            }
        } else {
            echo '-';
        }
    ?>
</span>
