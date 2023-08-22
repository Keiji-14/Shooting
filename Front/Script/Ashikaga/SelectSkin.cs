using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System.Linq;

class SelectSkin : MonoBehaviour
{
    [SerializeField] Image skinIcon;
    [SerializeField] List<Sprite> skinSprite;
    [SerializeField] Sprite[] skinInforSprite;
    [SerializeField] Text pageText;
    public int skinPageNum;
    public List<int> skinIDNum;
    public string inputSkinData;

    GameObject gamaManagerObj;
    GameManager gameManager;

    SkinInforList skinInforList;

    void Start()
    {
        gamaManagerObj = GameObject.Find("GameManager");
        gameManager = gamaManagerObj.GetComponent<GameManager>();
    }

    public void GetSkinJsonData()
    {
        skinInforList = JsonUtility.FromJson<SkinInforList>(inputSkinData);
        pageText.text = (skinPageNum + 1) + " / " + (skinInforList.skininfors.Count + 1);
        skinSprite.RemoveRange(1 ,skinSprite.Count - 1);
        skinIDNum.RemoveRange(1, skinIDNum.Count - 1);
        for (int i = 0; i < skinInforList.skininfors.Count; i++)
        {
            skinSprite.Add(skinInforSprite[skinInforList.skininfors[i].skin.id]);
            skinIDNum.Add(skinInforList.skininfors[i].skin.id); 
        }
        //skinSprite.Add(skinInforSprite[skinInforList.skininfors[skinInforList.skininfors.Count - 1].skin.id]);
    }

    private void LoopPage()
    {
        if (skinPageNum > skinInforList.skininfors.Count)
        {
            skinPageNum = 0;
        }
        if (skinPageNum < 0)
        {
            skinPageNum = skinInforList.skininfors.Count;
        }
        pageText.text = (skinPageNum + 1) + " / " + (skinInforList.skininfors.Count + 1);
    }

    public void RightSkin()
    {
        if (skinInforList.skininfors.Count != 0)
        {
            skinPageNum += 1;
            LoopPage();
            skinIcon.sprite = skinSprite[skinPageNum];
        }
    }

    public void LeftSkin()
    {
        if (skinInforList.skininfors.Count != 0)
        {
            skinPageNum -= 1;
            LoopPage();
            skinIcon.sprite = skinSprite[skinPageNum];
        }
        
    }

    // ƒXƒLƒ“•ÏX‚·‚é‚Æ‚«‚Ìˆ—
    public void SetSkin()
    {
        if (skinInforList.skininfors.Count != 0)
        {
            if (skinPageNum == 0)
            {
                Debug.Log("imageAddress:" + "Assets/Image/player1.png");
                gameManager.imageAddress = "Assets/Image/player1.png";
            }
            for (int i = 0; i < skinInforList.skininfors.Count; i++)
            {
                if (Int32.Parse(skinInforList.skininfors[i].skin_id) == skinIDNum[skinPageNum])
                {
                    Debug.Log("imageAddress:" + skinInforList.skininfors[i].skin.address);
                    gameManager.imageAddress = skinInforList.skininfors[i].skin.address;
                }
            }
        }
    }
}
