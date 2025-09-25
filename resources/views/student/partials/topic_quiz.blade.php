<h5>{{ $topic->title }} - Quiz</h5>

@if ($questions->count())
    <form method="POST" action="{{ route('student.quiz.submit', $topic->id) }}">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="border rounded p-3 mb-3">
                <h6>Q{{ $index + 1 }}. {{ $question->question }}</h6>
                @foreach ($question->choices as $choice)
                    <div class="form-check mb-2">
                        <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]"
                            id="choice-{{ $question->id }}-{{ $choice->id }}" value="{{ $choice->id }}">
                        <label class="form-check-label" for="choice-{{ $question->id }}-{{ $choice->id }}">
                            {{ $choice->choice_text }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Quiz</button>
    </form>
@else
    <p class="text-muted">⚠️ No questions available for this topic yet.</p>
@endif
