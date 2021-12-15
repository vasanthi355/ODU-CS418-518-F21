 <style>
    .snopes-wrapper {
        padding: 20px;
    }

    .submit-button {
        padding: 10px;
        background-color: black;
        color: white;
        border-radius: 10px;
        margin-top: 10px;
    }
</style>

<div class="snopes-wrapper">

    <form method="GET" action="updatedetails">
        <div>
            <p>1. Was the article true or false based on SciPEP’s recommendation?</p>

            @if($surveyResponses == true)
                <p>{{$surveyResponses[0]->q1_res}}</p>
            @else
                <input type="radio" id="true_1" name="question_1" value="True" required>
                <label for="true_1">True</label><br>
                <input type="radio" id="false_1" name="question_1" value="False">
                <label for="false_1">False</label><br>
                <input type="radio" id="nothing_1" name="question_1" value="I dont know">
                <label for="nothing_1">I don't know</label>
            @endif
        </div>

        <br>

        <div>
            <p>2. Did you have any prior beliefs/opinions about this topic? </p>

            @if($surveyResponses == true)
                <p>{{$surveyResponses[0]->q2_res}}</p>
            @else
                <input type="radio" id="yes_2" name="question_2" value="yes" required>
                <label for="yes_2">Yes</label><br>
                <input type="radio" id="No_2" name="question_2" value="No">
                <label for="No_2">No</label><br> 
            @endif 
        </div>

        <br>

        <div>
            <p>3. Did your prior beliefs/opinions on this topic align with our recommendation? </p>

            @if($surveyResponses == true)
                <p>{{$surveyResponses[0]->q3_res}}</p>
            @else
                <input type="radio" id="yes_3" name="question_3" value="yes" required>
                <label for="yes_3">Yes</label><br>
                <input type="radio" id="No_3" name="question_3" value="No">
                <label for="No_3">No</label><br>
                <input type="radio" id="NA_3" name="question_3" value="NA">
                <label for="NA_3">Not Applicable</label><br>
            @endif
        </div>

        <br>

        <div>
            <p>4. If you held prior beliefs/opinions that did not align with the system’s
            recommendation, did the system change your beliefs/opinions on this topic?
            </p>

            @if($surveyResponses == true)
                <p>{{$surveyResponses[0]->q4_res}}</p>
            @else
                <input type="radio" id="yes_4" name="question_4" value="yes" required>
                <label for="yes_4">Yes</label><br>
                <input type="radio" id="Somewhat_4" name="question_4" value="somewhat">
                <label for="Somewhat_4">Somewhat</label><br>
                <input type="radio" id="No_4" name="question_4" value="No">
                <label for="No_4">No</label><br>
                <input type="radio" id="NA_4" name="question_4" value="NA">
                <label for="No_4">Not Applicable</label><br>
            @endif
        </div>

        <br>

        <div>
            <p>5. What is your willingness to adopt the system for checking article credibility?
            </p>

            @if($surveyResponses == true)
                <p>{{$surveyResponses[0]->q5_res}}</p>
            @else
                <input type="radio" id="yes_4" name="question_5" value="Definitely" required>
                <label for="yes_4">Definitely</label><br>
                <input type="radio" id="Somewhat_4" name="question_5" value="Probably">
                <label for="Somewhat_4">Probably</label><br>
                <input type="radio" id="No_4" name="question_5" value="Probably Not">
                <label for="No_4">Probably Not</label><br>
                <input type="radio" id="NA_4" name="question_5" value="Definitely Not">
                <label for="No_4">Definitely Not</label><br>
            @endif
        </div>

        @if(!($surveyResponses == true))
            <input class="submit-button" type="submit" value="Submit">
        @endif
    </form>

</div>