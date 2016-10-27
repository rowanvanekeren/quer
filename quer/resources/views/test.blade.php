


<div>
    <form id="add_review" action="{{ url('add_review') }}" method="POST" >
        {{ csrf_field() }}
        <input type="hidden" name="quer_id" id="add_rev_querid" value="2">
        <input type="hidden" name="advertisement_id" id="add_rev_advertid" value="4">

        <label for="add_rev_content">Schrijf hier je review</label>
        <input type="text" name="revcontent" id="add_rev_content">

        <label for="add_rev_rate">Rate</label>
        <input id="add_rev_rate" name="rate" type="range" min="1" max="5" value="1">

        <label for="add_rev_succeeded">Succesfull transaction</label>
        <input id="add_rev_succeeded" name="succeeded" type="checkbox">

        <input type="submit" value="submit" >
    </form>
</div>