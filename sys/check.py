import cv2
from PIL import Image
from six import StringIO
import requests


cap = cv2.VideoCapture(0)
while True:
    ret, frame = cap.read()
    frame = cv2.flip(frame, 1)
    cv2.imshow('frame', frame)
    if cv2.waitKey(1) and 0xFF == ord('q'):

        frame_im = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        pil_im = Image.fromarray(frame_im)
        stream = StringIO()
        pil_im.save(stream, format="JPEG")
        stream.seek(0)
        img_for_post = stream.read()    
        files = {'image': img_for_post}
        response = requests.post(
            url='localhost/kiza/api',
            files=files
        )

        break

cap.release()
cv2.destroyAllWindows()