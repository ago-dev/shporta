<div class="container food-services-container">
    <div class="welcome-text-2">
        <h1>Hungry much? Find the best options for your taste in few clicks</h1>
    </div>
    <br>
    <div class="main">
        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input id="food-service-search" type="text"
                   class="form-control"
                   onkeyup="filter()"
                   placeholder="Search for Food Services">
        </div>
    </div>
    <div id="food-service-row" class="row">
        @foreach($foodServices as $foodService)
            <div class="col-md-3 col-sm-6 item bg-gradient-dark">
                <div class="card item-card card-block food-service-card">
                    <img src="{{ asset('images/food-services') }}/{{$foodService->image }}" alt="Food Service Logo">
                    <h5 class="item-card-title m-2 food-service-title">{{ $foodService->name }}</h5>
                    <p class="card-text m-1">{{ $foodService->description }}</p>
                    <a class="round-btn"
                    href="{{ route('food-service.show', $foodService->id) }}">See menu</a>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    function filter() {
        // Declare variables
        var input, filter, row, cards, text, i, txtValue;
        input = document.getElementById('food-service-search');
        filter = input.value.toUpperCase();

        row = document.getElementById("food-service-row");
        cards = row.getElementsByClassName('item');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < cards.length; i++) {
            text = cards[i].getElementsByClassName("food-service-title")[0];
            txtValue = text.textContent || text.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }

    $(document).ready(filter);
</script>
