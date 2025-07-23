<div class="container">
    <h2>Ask AI to Learn Something</h2>
    <form method="POST" action="/learn">
        @csrf
        <div class="form-group">
            <label for="query">What do you want to learn?</label>
            <input type="text" name="query" class="form-control" placeholder="e.g. How can I learn web development?"
                required>
        </div>
        <button class="btn btn-primary mt-2">Generate Course</button>
    </form>
</div>
