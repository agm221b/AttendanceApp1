package miniproject.it.attendanceapp;

import android.icu.text.SimpleDateFormat;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;


import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import java.util.Date;
import java.util.Vector;

public class TeachHomeAct extends AppCompatActivity {

    TextView tvDisp;
    Button btnAllowAtt, btnShowReg, btnStop;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_teach_home);

        tvDisp = (TextView) findViewById(R.id.tvWelcomeT);

        btnAllowAtt = (Button) findViewById(R.id.btnAllowAtt);
        btnStop = (Button) findViewById(R.id.btnStop);
        btnShowReg = (Button) findViewById(R.id.btnViewReg);

        btnAllowAtt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // allow attendance to be put by the students.
                //use insertteach.php & a text file.
                //create date of the row and add it to text file. //String date = new SimpleDateFormat("yyyy-MM-dd").format(new Date());
                //following it will be all the roll numbers that are present.
                String date = new SimpleDateFormat("yyyy-MM-dd").format(new Date());
                new AllowAttendAsyncTask().execute(date);


            }
        });

        btnStop.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // stop accepting responses
                //write file to database through php
                //call stopresp.php
            }
        });

        btnShowReg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //display the register here.
                //use of ArrayAdapter,
                //DisplayAsyncTask -> create and add to customStringArrayList;
                //arrayAdapterCustom = new ArrayAdapter<String> (TeachHomeAct.this,android.R.layout.simple_list_item_1, customStringArrayList);
                //listView.settheadapter(arrayAdapterCustom);
            }
        });


    }


    class AllowAttendAsyncTask extends AsyncTask<String,Void,String> //error in void type- debug
    {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected String doInBackground(String ... params) {
            String paramDate = params[0];

            Vector<NameValuePair> nameValuePairs= new Vector<NameValuePair>();
            nameValuePairs.add(new BasicNameValuePair("Date",paramDate));

            try{
                String SERVER_URL = "http://192.168.43.189/attendance/insertteach.php";  //the url of the php file on the server

                HttpPost httpPost = new HttpPost(SERVER_URL);
                httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

                HttpClient httpClient = new DefaultHttpClient();

                HttpResponse response = httpClient.execute(httpPost);
                Log.e("pass 1", "connection success");


            }
            catch (Exception ex)
            {
                return "Error :"+ex;
            }

            return "success";
        }

        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);

            Toast.makeText(TeachHomeAct.this,s, Toast.LENGTH_SHORT);
        }
    }

}
