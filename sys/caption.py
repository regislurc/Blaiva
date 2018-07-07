import pytesseract
import cv2

img = cv2.imread('../images/live/5af13c654dce2.png')
text = tesseract.image_to_string(img)
print(text)