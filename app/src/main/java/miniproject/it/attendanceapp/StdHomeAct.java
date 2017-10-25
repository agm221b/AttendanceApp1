package miniproject.it.attendanceapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;


/**
 * //(secondary)Use of SharedPreferences to maintain login and logout
 * //(secondary)Need to maintain login specific to mobile, <IMEI> number per phone.
 *
 * Current time isn't necessary but current period needs to be running because it shouldn't be refreshed from time to time
 *
 * use separate php page for insert action into the database.
 */
public class StdHomeAct extends AppCompatActivity {

    TextView tvDisp;
    Button btnPutAtt;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_std_home);

        Bundle ob = getIntent().getExtras();
        String ID = ob.getString("ID");
        String password = ob.getString("password");

        tvDisp = (TextView) findViewById(R.id.tvWelcomeS);
        btnPutAtt = (Button)findViewById(R.id.btnPutAtt);

        tvDisp.setText("Welcome, "+ ID);


        btnPutAtt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //send the roll number to the date corresponding text file through php to insert into database.
                // insertstud.php to be called
            }
        });












    }
}
