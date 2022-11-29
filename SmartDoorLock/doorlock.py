import pymysql

import RPi.GPIO as GPIO

import time

 

 

 

conn = pymysql.connect(host='localhost', user='root', password='1234', db='smartdoorlock', charset='utf8')

curs = conn.cursor(pymysql.cursors.DictCursor)

 

 

 

 

while(True):

    sql_sel = "select passkey from pass"

    curs.execute(sql_sel)

    conn.commit()

    rows = curs.fetchall()

    sql_up= "UPDATE pass SET passkey='1234' WHERE id='123'"

    key={'passkey': '4444'}

 

    

 

    try:

        

        if rows[0]==key:

            GPIO.setmode(GPIO.BCM)

            GPIO.setup(16,GPIO.OUT)

            time.sleep(2)

            GPIO.output(16,1)

            print("open")

            time.sleep(1.5)

            GPIO.output(16,0)

            time.sleep(2)

            curs.execute(sql_up)

            conn.commit()

                

    

    except KeyboardInterrupt: # If CTRL+C is pressed, exit cleanly:

        GPIO.cleanup()

 

 

 

    #finally:

        #GPIO.cleanup() # cleanup all GPIO 

                

    

            

    

        

       

           

            

conn.close()
