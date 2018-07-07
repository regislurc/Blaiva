git clone https://github.com/pdollar/coco.git

cd coco/PythonAPI/
make
python setup.py build
python setup.py install

cd ../../

git clone https://github.com/yunjey/pytorch-tutorial.git
cd pytorch-tutorial/tutorials/03-advanced/image_captioning/

pip install -r requirements.txt