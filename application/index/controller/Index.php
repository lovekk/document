<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
class Index extends Base{
    /*
     * 首页方法
     * */
    public function index(){
        return $this->fetch();
    }

    public function showpaper(){
        return $this->fetch();
    }

    /*
     * 期刊
     * */
    public function showJournal(){
        //点击标题阅读
        if (input('id')!=""){
            $id=input('id');
            $oneJournal=db('journal')->find($id);
            $this->assign('oneJournal',$oneJournal);

            $cnum=$oneJournal['cnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'cnum'=>$cnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('journal')->where('id','=',$id)->update($datapa);

            return $this->fetch('oneJournal');
        }
        //查询提交
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $journalList = db('journal')->where($menuData,'like','%'.$titleData.'%')->paginate(5);
            $this->assign('journalList',$journalList);
            return $this->fetch();
        }
        //显示列表
        $journalList = db('journal')->where('id','>',0)->paginate(5);
        $this->assign('journalList',$journalList);
        return $this->fetch();
    }
    /*
        * 下载期刊
        * */
    function outwordA(){
        vendor('PHPWord.PHPWord');
        vendor('PHPWord.PHPWord.Shared.Font');
        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();//添加默认页
        //定义table样式
        $styleTable = array('borderSize'=>1,'borderColor'=>'006699','cellMargin'=>30);
        //第一行样式
        $styleFirstRow = array('borderBottomSize'=>18,'borderBottomColor'=>'0000FF','bgColor'=>'66BBFF');
        //定义列样式
        $styleCell = array('valign'=>'center');
        //使用addCell的第二个参数来给单元格设置样式
        //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
        //为第一行定义字体样式
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //添加table样式
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        //添加表格table
        $table = $section->addTable('myOwnTableStyle');
        $PHPWord->setDefaultFontName('仿宋'); // 全局字体
        $PHPWord->setDefaultFontSize(12);     // 全局字号为3号
        //点击标题阅读
        if (input('id')!="" && input('qufen')==1) {
            $id = input('id');
            $oneJournal = db('journal')->find($id);
            //下载量
            $dnum=$oneJournal['dnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'dnum'=>$dnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('journal')->where('id','=',$id)->update($datapa);
            //添加行的高度
            $table->addRow(300);
            //添加列
            $table->addCell(9000, $styleCell)->addText('期刊标题：' .$oneJournal['title'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('作者：' .$oneJournal['author_ch'].'/'.$oneJournal['author_en'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('期刊类型：' .$oneJournal['type'].' 关键词 '.$oneJournal['con_key'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('期刊全称：' .$oneJournal['full_name'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版年份：' .$oneJournal['datetime'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('摘要：' .$oneJournal['abstract'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('正文：' . strip_tags($oneJournal['content']), $fontStyle);
        }
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('AdvancedTable.docx');
        $fileName = "文献下载".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
    /*
     * 专著
     * */
    public function showMonograph(){
        //点击标题阅读
        if (input('id')!=""){
            $id=input('id');
            $oneMono=db('monograph')->find($id);
            $this->assign('oneMono',$oneMono);

            $cnum=$oneMono['cnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'cnum'=>$cnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('monograph')->where('id','=',$id)->update($datapa);
            return $this->fetch('oneMonograph');
        }
        //查询提交
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $monoList = db('monograph')->where($menuData,'like','%'.$titleData.'%')->paginate(5);
            $this->assign('monoList',$monoList);
            return $this->fetch();
        }
        $monoList = db('monograph')->where('id','>',0)->paginate(5);
        $this->assign('monoList',$monoList);
        return $this->fetch();
    }
    /*
        * 下载专著
        * */
    function outwordB(){
        vendor('PHPWord.PHPWord');
        vendor('PHPWord.PHPWord.Shared.Font');
        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();//添加默认页
        //定义table样式
        $styleTable = array('borderSize'=>1,'borderColor'=>'006699','cellMargin'=>30);
        //第一行样式
        $styleFirstRow = array('borderBottomSize'=>18,'borderBottomColor'=>'0000FF','bgColor'=>'66BBFF');
        //定义列样式
        $styleCell = array('valign'=>'center');
        //使用addCell的第二个参数来给单元格设置样式
        //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
        //为第一行定义字体样式
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //添加table样式
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        //添加表格table
        $table = $section->addTable('myOwnTableStyle');
        $PHPWord->setDefaultFontName('仿宋'); // 全局字体
        $PHPWord->setDefaultFontSize(12);     // 全局字号为3号
        //点击标题阅读
        if (input('id')!="" && input('qufen')==2) {
            $id = input('id');
            $oneMono=db('monograph')->find($id);
                //下载量
                $dnum=$oneMono['dnum'] + 1;
                //var_dump($cnum);die();
                $datapa=[
                    'dnum'=>$dnum,
                ];
                //更新数据库
                //db('journal')->update($cnum);
                db('monograph')->where('id','=',$id)->update($datapa);

            //添加行的高度
            $table->addRow(300);
            //添加列
            $table->addCell(9000, $styleCell)->addText('专著标题：' . $oneMono['title'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('作者：' . $oneMono['author_ch'].'/'.$oneMono['author_en'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('专著类型：' .$oneMono['type'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版年份：' .$oneMono['datetime'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版者：' .$oneMono['publisher'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('摘要：' .$oneMono['abstract'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('正文：' . strip_tags($oneMono['content']), $fontStyle);
        }
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('AdvancedTable.docx');
        $fileName = "文献下载".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
    /*
     * 学位论文
     * */
    public function showThesis(){
        //点击标题阅读
        if (input('id')!=""){
            $id=input('id');
            $oneThesis=db('thesis')->find($id);
            $this->assign('oneThesis',$oneThesis);
            $cnum=$oneThesis['cnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'cnum'=>$cnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('thesis')->where('id','=',$id)->update($datapa);
            return $this->fetch('oneThesis');
        }
        //查询提交
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $thesisList = db('thesis')->where($menuData,'like','%'.$titleData.'%')->paginate(5);
            $this->assign('thesisList',$thesisList);
            return $this->fetch();
        }
        //显示列表
        $thesisList = db('thesis')->where('id','>',0)->paginate(5);
        $this->assign('thesisList',$thesisList);
        return $this->fetch();
    }
     /*
        * 下载学术论文
        * */
    function outwordC(){
        vendor('PHPWord.PHPWord');
        vendor('PHPWord.PHPWord.Shared.Font');
        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();//添加默认页
        //定义table样式
        $styleTable = array('borderSize'=>1,'borderColor'=>'006699','cellMargin'=>30);
        //第一行样式
        $styleFirstRow = array('borderBottomSize'=>18,'borderBottomColor'=>'0000FF','bgColor'=>'66BBFF');
        //定义列样式
        $styleCell = array('valign'=>'center');
        //使用addCell的第二个参数来给单元格设置样式
        //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
        //为第一行定义字体样式
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //添加table样式
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        //添加表格table
        $table = $section->addTable('myOwnTableStyle');
        $PHPWord->setDefaultFontName('仿宋'); // 全局字体
        $PHPWord->setDefaultFontSize(12);     // 全局字号为3号
        //点击标题阅读
        if (input('id')!="" && input('qufen')==3) {
            $id = input('id');
            $oneThesis = db('thesis')->find($id);
            //下载量
            $dnum=$oneThesis['dnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'dnum'=>$dnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('thesis')->where('id','=',$id)->update($datapa);
            //添加行的高度
            $table->addRow(300);
            //添加列
            $table->addCell(9000, $styleCell)->addText('学位论文：' .$oneThesis['title'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('作者：' .$oneThesis['author_ch'].'/'.$oneThesis['author_en'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('类型：' .$oneThesis['type'].' 关键词 '.$oneThesis['con_key'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('地区：' .$oneThesis['location'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('导师：' .$oneThesis['teacher'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版者：' .$oneThesis['publisher'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('地区：' .$oneThesis['location'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('摘要：' .$oneThesis['abstract'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('正文：' . strip_tags($oneThesis['content']), $fontStyle);
        }
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('AdvancedTable.docx');
        $fileName = "文献下载".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
    /*
     * 专利
     * */
    public function showPatent(){
        //点击标题阅读
        if (input('id')!=""){
            $id=input('id');
            $onePatent=db('patent')->find($id);
            $this->assign('onePatent',$onePatent);
            $cnum=$onePatent['cnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'cnum'=>$cnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('patent')->where('id','=',$id)->update($datapa);
            return $this->fetch('onePatent');
        }
        //查询提交
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $patentList = db('patent')->where($menuData,'like','%'.$titleData.'%')->paginate(5);
            $this->assign('patentList',$patentList);
            return $this->fetch();
        }
        //显示列表
        $patentList = db('patent')->where('id','>',0)->paginate(5);
        $this->assign('patentList',$patentList);
        return $this->fetch();
    }
    /*
        * 下载专利
        * */
    function outwordD(){
        vendor('PHPWord.PHPWord');
        vendor('PHPWord.PHPWord.Shared.Font');
        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();//添加默认页
        //定义table样式
        $styleTable = array('borderSize'=>1,'borderColor'=>'006699','cellMargin'=>30);
        //第一行样式
        $styleFirstRow = array('borderBottomSize'=>18,'borderBottomColor'=>'0000FF','bgColor'=>'66BBFF');
        //定义列样式
        $styleCell = array('valign'=>'center');
        //使用addCell的第二个参数来给单元格设置样式
        //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
        //为第一行定义字体样式
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //添加table样式
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        //添加表格table
        $table = $section->addTable('myOwnTableStyle');
        $PHPWord->setDefaultFontName('仿宋'); // 全局字体
        $PHPWord->setDefaultFontSize(12);     // 全局字号为3号
        //点击标题阅读
        if (input('id')!="" && input('qufen')==4) {
            $id = input('id');
            $onePatent = db('patent')->find($id);
            //下载量
            $dnum=$onePatent['dnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'dnum'=>$dnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('patent')->where('id','=',$id)->update($datapa);
            //添加行的高度
            $table->addRow(300);
            //添加列
            $table->addCell(9000, $styleCell)->addText('专利标题：' .$onePatent['title'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('作者：' .$onePatent['author_ch'].'/'.$onePatent['author_en'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('专利类型：' .$onePatent['type'].' 关键词 '.$onePatent['con_key'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('国别：' .$onePatent['country'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('专利号：' .$onePatent['number'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版年份：' .$onePatent['datetime'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('摘要：' .$onePatent['abstract'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('正文：' . strip_tags($onePatent['content']), $fontStyle);
        }
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('AdvancedTable.docx');
        $fileName = "文献下载".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
    /*
     * 标准
     * */
    public function showStandard(){
        //点击标题阅读
        if (input('id')!=""){
            $id=input('id');
            $oneStandard=db('standard')->find($id);
            $this->assign('oneStandard',$oneStandard);
            $cnum=$oneStandard['cnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'cnum'=>$cnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('standard')->where('id','=',$id)->update($datapa);
            return $this->fetch('oneStandard');
        }
        //查询提交
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $standardList = db('standard')->where($menuData,'like','%'.$titleData.'%')->paginate(5);
            $this->assign('standardList',$standardList);
            return $this->fetch();
        }
        //显示列表
        $standardList = db('standard')->where('id','>',0)->paginate(5);
        $this->assign('standardList',$standardList);
        return $this->fetch();
    }
 /*
        * 下载标准
        * */
    function outwordE(){
        vendor('PHPWord.PHPWord');
        vendor('PHPWord.PHPWord.Shared.Font');
        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();//添加默认页
        //定义table样式
        $styleTable = array('borderSize'=>1,'borderColor'=>'white','cellMargin'=>30);
        //第一行样式
        $styleFirstRow = array('borderBottomSize'=>18,'borderBottomColor'=>'0000FF','bgColor'=>'66BBFF');
        //定义列样式
        $styleCell = array('valign'=>'center');
        //使用addCell的第二个参数来给单元格设置样式
        //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
        //为第一行定义字体样式
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //添加table样式
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        //添加表格table
        $table = $section->addTable('myOwnTableStyle');
        $PHPWord->setDefaultFontName('仿宋'); // 全局字体
        $PHPWord->setDefaultFontSize(12);     // 全局字号为3号
        //点击标题阅读
        if (input('id')!="" && input('qufen')==6) {
            $id = input('id');
            $oneStandard = db('standard')->find($id);
            //下载量
            $dnum=$oneStandard['dnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'dnum'=>$dnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('standard')->where('id','=',$id)->update($datapa);
            //添加行的高度
            $table->addRow(300);
            //添加列
            $table->addCell(9000, $styleCell)->addText('标准名称：' .$oneStandard['sta_name'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('标准类型：' .$oneStandard['type'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('发布部门：' .$oneStandard['department'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('发布日期：' .$oneStandard['datetime'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('实施日期：' .$oneStandard['datetime_action'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('标准编号：' .$oneStandard['number'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('状态：' .$oneStandard['condition'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('废除日期：' .$oneStandard['datetime_abolish'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('摘要：' .$oneStandard['abstract'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('正文：' . strip_tags($oneStandard['content']), $fontStyle);
        }
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('AdvancedTable.docx');
        $fileName = "文献下载".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
    /*
     * 报纸
     * */
    public function showNewspaper(){
        //点击标题阅读
        if (input('id')!=""){
            $id=input('id');
            $oneNewspaper=db('newspaper')->find($id);
            $this->assign('oneNewspaper',$oneNewspaper);
            $cnum=$oneNewspaper['cnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'cnum'=>$cnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('newspaper')->where('id','=',$id)->update($datapa);
            return $this->fetch('oneNewspaper');
        }
        //查询提交
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $newspaperList = db('newspaper')->where($menuData,'like','%'.$titleData.'%')->paginate(5);
            $this->assign('newspaperList',$newspaperList);
            return $this->fetch();
        }
        //显示列表
        $newspaperList = db('newspaper')->where('id','>',0)->paginate(5);
        $this->assign('newspaperList',$newspaperList);
        return $this->fetch();
    }
/*
        * 下载期刊
        * */
    function outwordF(){
        vendor('PHPWord.PHPWord');
        vendor('PHPWord.PHPWord.Shared.Font');
        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();//添加默认页
        //定义table样式
        $styleTable = array('borderSize'=>1,'borderColor'=>'006699','cellMargin'=>30);
        //第一行样式
        $styleFirstRow = array('borderBottomSize'=>18,'borderBottomColor'=>'0000FF','bgColor'=>'66BBFF');
        //定义列样式
        $styleCell = array('valign'=>'center');
        //使用addCell的第二个参数来给单元格设置样式
        //$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
        //为第一行定义字体样式
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //添加table样式
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        //添加表格table
        $table = $section->addTable('myOwnTableStyle');
        $PHPWord->setDefaultFontName('仿宋'); // 全局字体
        $PHPWord->setDefaultFontSize(12);     // 全局字号为3号
        //点击标题阅读
        if (input('id')!="" && input('qufen')==6) {
            $id = input('id');
            $oneNewspaper = db('newspaper')->find($id);
            //下载量
            $dnum=$oneNewspaper['dnum'] + 1;
            //var_dump($cnum);die();
            $datapa=[
                'dnum'=>$dnum,
            ];
            //更新数据库
            //db('journal')->update($cnum);
            db('newspaper')->where('id','=',$id)->update($datapa);
            //添加行的高度
            $table->addRow(300);
            //添加列
            $table->addCell(9000, $styleCell)->addText('报纸篇名：' .$oneNewspaper['title'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('作者：' .$oneNewspaper['author_ch'].'/'.$oneNewspaper['author_en'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('类型：' .$oneNewspaper['type'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('版次：' .$oneNewspaper['version'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('报纸名称：' .$oneNewspaper['paper_name'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版年份：' .$oneNewspaper['datetime'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('出版者：' .$oneNewspaper['publisher'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('摘要：' .$oneNewspaper['abstract'], $fontStyle);
            $table->addRow(300);
            $table->addCell(9000, $styleCell)->addText('正文：' . strip_tags($oneNewspaper['content']), $fontStyle);
        }
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('AdvancedTable.docx');
        $fileName = "文献下载".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
}
