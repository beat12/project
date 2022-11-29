import RPi.GPIO as GPIO

import time

import requests

import json

from gtts import gTTS

import os

import pyglet

import subprocess

from turtle import distance

import RPi.GPIO as gpio

import time

 

n="36.543"

e="128.796"

apiKey = "00f5e4b699c8ba4a749cbec81e9b36a7"

lang = 'kr' #언어

units = 'metric' #화씨 온도를 섭씨 온도로 변경

api = f"https://api.openweathermap.org/data/2.5/weather?lat={n}&lon={e}&appid={apiKey}&lang={lang}&units={units}"

 

 

result = requests.get(api)

result = json.loads(result.text)

 

name = result['name']

weather = result['weather'][0]['main']

temperature = result['main']['temp']

__author__ = 'info-lab'

 

tts = gTTS(

 

    text='안녕하세요 현재 날씨는' + weather + '기온은' + str([temperature]) + '도 입니다' ,

    lang='ko'

)

tts.save('spkk.mp3')

 

TRIGER = 17

ECHO = 27

 

gpio.setmode(gpio.BCM)

gpio.setup(TRIGER,gpio.OUT)

gpio.setup(ECHO,gpio.IN)

 

 

def getDistance():

    gpio.output(TRIGER,False)

    time.sleep(1)

    gpio.output(TRIGER,True)

    time.sleep(0.00001) 

    gpio.output(TRIGER,False)

    

    while gpio.input(ECHO) == 0 : 

         pulse_start = time.time() # 현재 시간을 측정 - HIGH신호가 발생되는 시간을 측정

         

    while gpio.input(ECHO)==1:

        pulse_end = time.time() # ECHO핀이 LOW신호가 발생되는 시간을 측정

        

    pulse_duration = pulse_end - pulse_start

    

    distance = pulse_duration * 340 * 100 /2

    distance = round(distance,2)

    return distance

    

    

 

 

if __name__ =="__main__":

    try:

        while True:

            distance_value = getDistance()

            if distance_value <=40:

                print("adsfadfa")

                song = pyglet.media.load('spkk.mp3')

                song.play()

                time.sleep(10)

            

                

    except KeyboardInterrupt: # If CTRL+C is pressed, exit cleanly:

        GPIO.cleanup()

 

 

pyglet.app.run()
