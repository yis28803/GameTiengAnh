<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle Game</title>
    <style>
        .correct { color: green; }
        .present { color: orange; }
        .absent { color: gray; }
    </style>
</head>
<body>
    <h1>Wordle Game</h1>

    @if (session('success'))
        <h2>Congratulations! You guessed the word correctly.</h2>
        <a href="/">Play Again</a>
    @else
        <form action="/guess" method="POST">
            @csrf
            <label for="guess">Enter your guess:</label>
            <input type="text" name="guess" id="guess" maxlength="5" required>
            <button type="submit">Guess</button>
        </form>

        <h2>Attempts:</h2>
        @foreach ($attempts as $attempt)
            <div>
                @foreach ($attempt as $feedback)
                    <span class="{{ $feedback['status'] }}">{{ $feedback['letter'] }}</span>
                @endforeach
            </div>
        @endforeach
    @endif
</body>
</html>
