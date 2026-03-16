<main>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Entertainment</p>
                        <h1>Our Games</h1>
                        <p>Welcome to our new games section. Content is coming soon!</p>
                    </div>
                </div>
            </div>
            
            <div class="row" x-data="{ count: 0 }">
                <div class="col-lg-12 text-center mt-5">
                    <h3>Interactive Alpine Quiz</h3>
                    <p>How many times have you been excited about games?</p>
                    <div class="h2 mb-4" x-text="count">0</div>
                    <button @click="count++" class="btn btn-primary">I'm Excited!</button>
                    <button @click="count = 0" class="btn btn-outline-danger">Reset</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Form and button will disabled on submit</p>
                    <form wire:submit="save">
                        <input wire:model="title" type="text" x-on:blur="$wire.save()">  
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
