package portomontenegro.portomontenegro;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;

/**
 * Created by user on 23.5.2018..
 */

public class SplashScreenActivity extends AppCompatActivity
{

    // Poziva splash screen u trajanju od 0.5 sekundi
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);

        Thread noviThread = new Thread()
        {
            @Override
            public void run() {
                try {
                    sleep(500);
                    Intent intent = new Intent(getApplicationContext(), TypeOfUserActivity.class);
                    startActivity(intent);
                    finish();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        };
        noviThread.start();

    }
}
