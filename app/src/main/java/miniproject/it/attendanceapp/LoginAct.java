package miniproject.it.attendanceapp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;

public class LoginAct extends AppCompatActivity {

    EditText etID, etPassword;
    CheckBox showPass;
    Button btnStdLogin, btnTeachLogin, btnRegister;
    String ID, password;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        etID = (EditText) findViewById(R.id.etID);
        etPassword =(EditText) findViewById(R.id.etPassword);
        showPass = (CheckBox) findViewById(R.id.showPass);
        btnStdLogin = (Button) findViewById(R.id.btnStdLogin);
        btnTeachLogin = (Button) findViewById(R.id.btnTeachLogin);
        btnRegister = (Button) findViewById(R.id.btnRegister);

        /**
         * checkbox.setOnCheckedChangeListener(new OnCheckedChangeListener() {
        @Override
        public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
        if(!isChecked) {
        password.setInputType(InputType.TYPE_TEXT_VARIATION_PASSWORD);
        } else {
        password.setInputType(129);  //password.setInputType(InputType.TYPE_CLASS_TEXT | InputType.TYPE_TEXT_VARIATION_PASSWORD);
        }
        }
        });
         *
         */

        btnStdLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(verifyCredStd()) {//after verification, send to respective home page.
                    Intent i = new Intent(LoginAct.this, StdHomeAct.class);
                    i.putExtra("ID", ID);
                    i.putExtra("password", password);
                    startActivity(i);
                }
            }
        });

        btnTeachLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(verifyCredTeach()) {
                    //after verification, send to respective home page.
                    Intent i = new Intent(LoginAct.this,TeachHomeAct.class);
                    i.putExtra("ID",ID);
                    i.putExtra("password",password);
                    startActivity(i);
                }
            }
        });

        btnRegister.setOnClickListener((new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent();
            }
        }));
    }

    boolean verifyCredStd()
    {
        ID =etID.getText().toString();
        password = etPassword.getText().toString();
        //Verification from the Students Database
        return  true;
        //create a studlog database containing the IDs & passwords of all students, located on the server.
        //once created, it'll fetch from here and check with the server.
        //if correct proceed to stdhomeact.java, if incorrect, retry.
    }

    boolean verifyCredTeach()
    {
        ID =etID.getText().toString();
        password = etPassword.getText().toString();
        //Verification from the Teacher Database
        return true;
        // create a proflog database containing IDs & passwords of all profs, located on the server.
        //once created, it'll fetch from here and check against the data in the server.
        //if correct, proceed to teachhomeact.java, else retry.
    }
}
