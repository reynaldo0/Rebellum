import { useFrame } from "@react-three/fiber";
import React from "react";
import * as THREE from "three";

export const useRotateAnimation = (
    objectRef: React.MutableRefObject<THREE.Object3D | undefined>
) => {
    useFrame(() => {
        if (objectRef.current) {
            objectRef.current.rotation.y += Math.PI / 270;
        }
    });
};